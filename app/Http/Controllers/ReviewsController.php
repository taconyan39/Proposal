<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Review;
use App\Idea;
use App\Mail\ArrivedReview;
use App\Http\Requests\PostReviewRequest;

class ReviewsController extends Controller
{

    // 口コミ投稿ページの表示
    public function index(){
        $reviews = Review::orderBy('created_at', 'desc')->paginate(10);


        return view('reviews.all-reviews-list',['reviews' => $reviews]);

    }
    // 口コミ投稿ページの表示
    public function create($id){

        $user = Auth::user();
        $idea = Idea::find($id);
        $contributor_flg = Idea::where('id',$id)->where('user_id', $user->id);

        $review_flg = Review::where('idea_id',$id)->where('user_id', $user->id);

        // 口コミを投稿済みの場合には戻る
        if($review_flg->exists()){

            return back()->with('flash_message', 'すでに口コミを投稿済みです');
        }elseif($contributor_flg->exists()){
            
            //投稿者は口コミを投稿できないようにする
            return back()->with('flash_message', '投稿者は口コミを投稿できません');
        }

        return view('reviews.post-review', ['idea' => $idea, 'user' => $user]);

    }

    public function postreview(PostReviewRequest $request, $id){

        $user = Auth::user();
        $idea = Idea::find($id);
        $contributor = Idea::where('id',$id)->where('user_id', $user->id);

        $review = Review::where('idea_id',$id)->where('user_id', $user->id);

        // 口コミを投稿済みの場合には戻る
        if($review->exists()){

            return redirect('idea/' . $id)->with('flash_message', 'すでに口コミを投稿済みです');

        //投稿者は口コミを投稿できないようにする
        }elseif($contributor->exists()){
            
            return redirect('post-idea/' . $id)->with('flash_message', '投稿者は口コミを投稿できません');
        }

        // DBに購入情報を登録
        DB::table('reviews')->insert([
            'user_id' => $user->id,
            'idea_id' => $id,
            'review' => $request->review,
            'rating' => $request->rating,
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now()
        ]);

        Mail::to($idea->user->email)->send(new ArrivedReview());

        return redirect('idea/' . $id)->with('flash_message', '口コミが投稿されました');

    }

    public function toMeReviews(){

        $user = Auth::user();
        $user_id = $user->id;
        $reviews = Review::whereHas('idea', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->orderBy('created_at')->paginate(10);

        return view('reviews.myidea-reviews',['reviews' => $reviews]);
    }
}

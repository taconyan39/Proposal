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

// 口コミ操作用のクラス
class ReviewsController extends Controller
{

    // 口コミ一覧の表示
    public function index(){
        $reviews = Review::orderBy('created_at', 'desc')->paginate(10);

        return view('reviews.all-reviews-list',['reviews' => $reviews]);

    }

    public function postForm($id){
        
        $idea = Idea::find($id);
        if(!ctype_digit($id) || $idea === null){
            return redirect('mypage')->with('flash_message', __('Invalid operation was performed.'));
        }

        $user = Auth::user();
        
        if($idea->user->id === $user->id){
            return  redirect('mypage');
        }elseif(Review::where('idea_id', $id)->where('user_id', $user->id)->exists()){
            return redirect('mypage')->with('flash_message', 'レビューは投稿済みです');
        }

        return view('reviews.post-review-form', ['user' => $user, 'idea' => $idea]);
    }

    // 口コミに投稿処理
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

        Mail::to($idea->user->email)->send(new ArrivedReview($idea));

        return redirect('idea/' . $id)->with('flash_message', '口コミが投稿されました');

    }

    // 自分のアイデアに対する口コミの一覧
    public function toMeReviews(){

        $user = Auth::user();
        $user_id = $user->id;

        // レビューを登録順に取得
        $reviews = Review::whereHas('idea', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->orderBy('created_at')->paginate(10);
        

        return view('reviews.myidea-reviews',['reviews' => $reviews]);
    }
}

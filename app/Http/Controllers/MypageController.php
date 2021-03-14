<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Idea;
use App\Review;
use App\Http\Controllers\Controller,
    Session;

// マイページの表示用
class MypageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     // マイページの表示
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;

        // sessionにユーザー情報を入れる
        Session::put([
            'name' => $user->name, 'icon_img' => $user->icon_img,
            'introduction' => $user->introduction
            ]);

        $postIdeas = Idea::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

        // 口コミの平均点を代入
        foreach($postIdeas as $interestIdea){
            $interestIdea->rating = sprintf('%.1f',$interestIdea->reviews->avg('rating'));
            $interestIdea->countReview = $interestIdea->reviews->count();
        }

        // 購入したアイデアを日付順に取得
        $buyIdeas = Idea::whereHas('buyIdeas', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->take(5)->get();

        // 購入したアイデアの口コミを代入
        foreach($buyIdeas as $buyIdea){
            $buyIdea->rating = sprintf('%.1f',$buyIdea->reviews->avg('rating'));
            $buyIdea->countReview = $buyIdea->reviews->count();
        }

        // お気に入りアイテムを登録順に取得
        $interestIdeas = Idea::whereHas('interests', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->take(5)->get();

        // 口コミの平均点を代入
        foreach($interestIdeas as $interestIdea){
            $interestIdea->rating = sprintf('%.1f',$interestIdea->reviews->avg('rating'));
            $interestIdea->countReview = $interestIdea->reviews->count();
        }

        // レビューを日付順に取得
        $ideaReviews = Review::whereHas('idea', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->take(5)->get();

        return view('mypage',['user' => $user, 'postIdeas' => $postIdeas, 'interestIdeas' => $interestIdeas, 'ideaReviews' => $ideaReviews, 'buyIdeas' => $buyIdeas]);
    }

}

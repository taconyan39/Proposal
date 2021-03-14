<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Category;
use App\Review;

// トップページ表示用のクラス
class TopController extends Controller
{
    // トップページの表示
    public function index(){

        $categories = Category::all();
        $ideas = Idea::latest()->take(3)->get();

        // アイデアを気になるの多い順に並べる
        $attentionIdeas = Idea::withCount('interests')->orderBy('interests_count', 'desc')->paginate(3);

        // アイデアを売上順に並べる
        $hotIdeas = Idea::withCount('buyIdeas')->orderBy('buy_ideas_count', 'desc')->paginate(3);

        // レビューを新着順に並べる
        $reviews = Review::latest()->take(4)->get();

        // 口コミの平均値を$ideasに格納する
        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        foreach($attentionIdeas as $attentionIdea){
            $attentionIdea->rating = sprintf('%.1f',$attentionIdea->reviews->avg('rating'));
            $attentionIdea->countReview = $attentionIdea->reviews->count();
        }
        foreach($hotIdeas as $hotIdea){
            $hotIdea->rating = sprintf('%.1f',$hotIdea->reviews->avg('rating'));
            $hotIdea->countReview = $hotIdea->reviews->count();
        }

        foreach($reviews as $review){
            $review->idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $review->idea->countReview = $idea->reviews->count();
        }

        $pickupCategories =  Category::all()->take(6);

        return view('index', ['ideas' => $ideas, 'categories' => $categories, 'pickupCategories' => $pickupCategories, 'reviews' => $reviews, 'attentionIdeas' => $attentionIdeas, 'hotIdeas' => $hotIdeas]);
    }

    public function about(){
        return view('about');
    }

}

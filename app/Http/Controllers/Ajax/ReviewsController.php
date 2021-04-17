<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;

// レビュー投稿フォームのAjax処理
class ReviewsController extends Controller
{
    // レビューの一覧を表示
    public function show($id){
        $reviews = Review::where('idea_id', $id)->with('user','idea')->orderBy('created_at', 'desc')->paginate(5);

        return $reviews;
    }

}


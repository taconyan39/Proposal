<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Idea;
use App\Review;
use App\Http\Requests\PostIdeaRequest;


// 投稿者側のアイデアの処理
class PostIdeasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // 投稿したアイデア一覧
    public function index()
    {

        return redirect('all-ideas-');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //新規アイデア投稿ページへの遷移
    public function create()
    {
        $user = Auth::user();
        $user_img = $user->icon_img;
        $categories = Category::all();

        return view('post-idea.create-idea', ['user' => $user, 'categories' => $categories, 'user_img' => $user_img]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // 新規アイデアの投稿処理
    public function store(PostIdeaRequest $request)
    {

        $idea = new Idea;

        $idea->category_id = (int)$request->category_id;

        $idea->user_id = Auth::user()->id;

        $idea->fill($request->all())->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // 自分が投稿したアイデアの表示
    public function show($id)
    {
        if(!ctype_digit($id)){
            return redirect('mypage')->with('flash_message', __('Invalid operation was performed.'));
        }

        $user = Auth::user();

        // 口コミの平均点を代入
        $idea = Idea::find($id);
        $idea->rating = sprintf('%.1f',$idea->reviews()->avg('rating'));
        $idea->countReview = $idea->reviews->count();

        // 投稿者でなかった場合に通常の商品ページに移動
        if($user->id !== $idea->user_id){
            return redirect('idea/'. $id);
        }

        // アイデアに投稿された口コミとその情報を取得
        $reviews = Review::all()->where('idea_id', $id)->take(5);
        
        return view('post-idea.myidea',[ 'user' => $user, 'idea' => $idea, 'reviews' => $reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // アイデアの編集ページ
    public function edit($id)
    {
        if(!ctype_digit($id)){
            return redirect('mypage')->with('flash_message', __('Invalid operation was performed.'));
        }

        $user = Auth::user();
        $idea = Idea::find($id);

        // 投稿者ではない場合にマイページに遷移する
        if($user->id !== $idea->user->id){
            return redirect('mypage')->with('flash_message', __('Invalid operation was performed.'));
        }

        // 購入がある場合はページにアクセスできないようにする
        if($idea->buy_flg){
            return redirect('mypage')->with('flash_message', '購入されたアイデアは編集できません');
        }


        $categories = Category::all();
        return view('post-idea.edit',[ 'categories' => $categories, 'user' => $user, 'idea' => $idea]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // アイデアの更新処理
    public function update(PostIdeaRequest $request, $id)
    {
        $user = Auth::user();
        $idea = Idea::find($id);

        // 投稿者ではない場合にマイページに遷移する
        if($user->id !== $idea->user->id){
            return redirect('mypage')->with('flash_message', __('Invalid operation was performed.'));
        }

        $idea->fill($request->all())->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // アイデアの削除処理
    public function destroy($id)
    {
        $user = Auth::user();
        $idea = Idea::find($id);

        // 投稿者ではない場合にマイページに遷移する
        if($user->id !== $idea->user->id){
            return redirect('mypage')->with('flash_message', __('Invalid operation was performed.'));
        }

        Idea::find($id)->delete();
        return redirect('mypage')->with('flash_message', '削除しました');
    }

}

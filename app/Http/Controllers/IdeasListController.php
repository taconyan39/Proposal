<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Idea;
use App\Sort;
use App\Category;
use App\User;

// アイデア一覧表示用クラス
class IdeasListController extends Controller
{

    // すべてのアイデア一覧
    public function index(Request $request){
        
        $categories = Category::all();
        $sorts = Sort::all();

        $data = [
            'sort_id' => $request->get('sort_id'),
            'category_id' => $request->get('category_id'),
        ];


        // ソートの条件を変数に入れる
        switch($data['sort_id']){
            case 2:
                $type = 'created_at';
                $order = 'asc';
                break;
            case 3:
                $type = 'price';
                $order = 'desc';
                break;
            case 4:
                $type = 'price';
                $order = 'asc';
                break;
            default:
                $type = 'created_at';
                $order = 'desc';
                break;
        }

        if(!$data['category_id']){
            // カテゴリがない場合の処理
            $ideas = Idea::orderBy($type, $order)->paginate(10);
        }else{
            // カテゴリ検索がある場合の処理
            $ideas = Idea::where('category_id', $data['category_id'])->orderBy($type, $order)->paginate(10);
        }

        // アイデアの口コミを代入する
        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.all-ideas-list', ['categories' => $categories, 'ideas' => $ideas, 'data' => $data, 'sorts' => $sorts]);
    }

    // ソート処理
    public function search(Request $request){
        
        $categories = Category::all();
        $category_id = $request->category_id;

        // 並べ替えの条件を判定
        if($request->type == 2){
            $type = 'price';
        }else{
            $type = 'created_at';
        }

        if($request->order == 2){
            $order = 'asc';
        }else{
            $order = 'desc';
        }

        // カテゴリーの絞り込みがあるか？
        if($category_id < 0){
            $ideas = Idea::orderBy($type, $order)->paginate(10);
        }else{
            // 絞ったカテゴリーを取得
            $ideas = Idea::where('category_id', $category_id)->orderBy($type, $order)->paginate(10);
        }

        // アイデアの平均点を代入
        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list', ['categories' => $categories, 'ideas' => $ideas, 'order' => $request, 'type' => $request->type, 'category_id' => $category_id]);
    }

    // 投稿したアイデア一覧
    public function myidea(){
        
        $categories = Category::all();
        $user = Auth::user();
        $ideas = Idea::where('user_id', $user->id)->orderBy('created_at','desc')->paginate(10);

        // 口コミの平均点を代入
        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.myideas-list', ['user' => $user ,'ideas' => $ideas, 'categories' => $categories]);
    }

    // 気になるリスト一覧
    public function interest(){

        $user = Auth::user();

        $categories = Category::all();
        $user_id = $user->id;

        // 気になるリストを登録順に代入
        $ideas = Idea::whereHas('interests', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->paginate(10);


        // 口コミの平均を代入
        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.interests-list', ['user' => $user ,'ideas' => $ideas, 'categories' => $categories]);
    }

    // 気になる解除処理
    public function interestRemove(Request $request){
        $user = Auth::user();

        // 気になるを解除
        DB::table('interests')->where('user_id', $user->id)->where('idea_id', $request->idea_id)->delete();

        return redirect(url()->previous())->with('flash_message', '気になるを解除しました');
    }
    
    // 購入したアイデアの一覧
    public function buyIdeas(){
        $user = Auth::user();

        $categories = Category::all();
        $user_id = $user->id;

        // 購入したアイデアを購入順に取得
        $ideas = Idea::whereHas('buyIdeas', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->paginate(10);

        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.buy-ideas-list', ['user' => $user ,'ideas' => $ideas, 'categories' => $categories]);

    }

    public function userIdeas($id){

        if(!ctype_digit($id)){
            return redirect('mypage')->with('flash_message', __('Invalid operation was performed.'));
        }

        $user = User::find($id);

        if($user === null){
           abort(404); 
        }

        if(Auth::check()){
            $owner = Auth::user();
            if($owner->id === (int)$id){
                return redirect('myideas-list');
            }
        }

        $categories = Category::all();
        $ideas = Idea::where('user_id', $id)->paginate(10);

        // 購入したアイデアを購入順に取得

        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.user-ideas-list', [ 'user' => $user, 'ideas' => $ideas, 'categories' => $categories]);

    }

    public function attentionRanking(){

         // アイデアを気になるの多い順に並べる
         $ideas = Idea::withCount('interests')->orderBy('interests_count', 'desc')->paginate(10);

        // 口コミの平均を代入
        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.attention-ideas-ranking', ['ideas' => $ideas]);
    }

    public function sellingRanking(){

         // アイデアを気になるの多い順に並べる
         $ideas = Idea::withCount('buyIdeas')->orderBy('buy_ideas_count', 'desc')->paginate(10);

        // 口コミの平均を代入
        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.selling-ideas-ranking', ['ideas' => $ideas]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Idea;
use App\Review;
use Illuminate\Support\Facades\Mail;
use App\Mail\IdeaSoldMail;
use App\Mail\IdeaBoughtMail;
use Carbon\Carbon;

// 購入者側のアイデアの処理
class ShowIdeaController extends Controller
{
    // アイデアの表示
    public function show($id){

            if(!ctype_digit($id)){
                return redirect('mypage')->with('flash_message', __('Invalid operation was performed.'));
            }
    
            $user = Auth::user();
            $idea = Idea::find($id);

            if($idea === null){
               abort(404); 
            }

            $idea->rating = sprintf('%.1f',$idea->reviews()->avg('rating'));
            $idea->countReview = $idea->reviews->count();
            
            // 未ログインの場合には未ログイン用のデータを返す
            if(!Auth::check()){
                return view('post-idea.idea',['idea' => $idea]);
            }
            // 投稿者の場合には投稿者用のページに遷移する
            if($user->id === $idea->user_id){
                return redirect('post-idea/'. $id);
            }

            // 購入済みの場合の処理
            if(DB::table('buy_ideas')->where('user_id', $user->id)->where('idea_id', $idea->id)->exists()){
                $buy_flg = true;
                $interest_flg = false;
            }else{
                $buy_flg = false;
                // 未購入で気になる追加済みの処理
                if(DB::table('interests')->where('user_id', $user->id)->where('idea_id', $idea->id)->exists()){
                    $interest_flg = true;
                    // 未購入気になる未追加の処理
                }else{
                    $interest_flg = false;
                }
            }
            
            // 自分が口コミを投稿したか
            $myreview = Review::where('idea_id', $id)->where('user_id', $user->id);
    
            if($myreview->exists()){
                $myreview = $myreview->first();
            }else{
                $myreview = false;
            }
    
            // アイデアに投稿された口コミとその情報を取得
            $reviews = Review::all()->where('idea_id', $id)->take(5);
            
            return view('post-idea.idea',[ 'user' => $user, 'idea' => $idea, 'reviews' => $reviews, 'interest_flg' => $interest_flg, 'buy_flg' => $buy_flg, 'myreview' => $myreview]);

    }

    // 購入処理
    public function buy(Request $request ,$id){

        $user = Auth::user();
        $idea = Idea::find($id);

        // 投稿者の情報を取得
        $contributor = DB::table('ideas')->where('id', $id)->where('user_id', $user->id)->exists();

        // アイデアの購入履歴を取得
        $buy_flg = DB::table('buy_ideas')->where('idea_id', $id)->where('user_id',$user->id)->exists();

        // すでに購入済みでないかの確認
        if($buy_flg){
            return redirect('post-idea/' . $id)->with('flash_message', 'すでに購入済みです');

            // アイデアの投稿者でないか？
        }elseif($contributor){
            return redirect('post-idea/' . $id)->with('flash_message', '投稿者は購入できません');
        }else{

            // 購入が発生した場合にアイデアに購入済みフラグをつける

            if($idea->sold_flg == 0){
                $idea->sold_flg = true;
                $idea->save();
            }

            // 購入者と出品者にメールを送信
            Mail::to($user->email)->send(new IdeaBoughtMail($user, $idea));

            Mail::to($idea->user->email)->send(new IdeaSoldMail($idea));

            //購入データの登録
            DB::table('buy_ideas')->insert([
                'idea_id' => $id,
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
                return redirect('idea/' . $id);
        }
    }

}

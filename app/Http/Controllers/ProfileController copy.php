<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileEditRequest;
use Illuminate\Support\Facades\Storage;

// プロフィール用クラス
class ProfileController extends Controller
{
    // プロフィール編集画面の表示
    public function edit(){

        $user = Auth::user();
        $user_img = $user->icon_img;

        return view('profile', ['user' => $user, 'user_img' => $user_img]);
    }

    // プロフィール更新処理
    public function update(ProfileEditRequest $request)
    {
        $user = Auth::user();
        $form = $request->all();
        $id = $user->id;

        // 画像がＰＯＳＴされているか確認
        if($request->file('icon_img') !== null){

            $profileImage = $request->file('icon_img');

            // 画像の拡張子を取得
            $extension = $profileImage->getClientOriginalExtension();
            
            // ファイル名を指定
            $file_name = 'icon_' . $id . '.' .$profileImage->getClientOriginalExtension();

            // 画像をリサイズ
            $resize_img = \Image::make($profileImage)->resize(300, 300)->encode($extension);

            // s3のディレクトリに追加
            Storage::disk('s3')->put('/images/icons/' . $file_name,(string)$resize_img, 'public');

            // DBにパスを登録
            $form['icon_img'] = Storage::disk('s3')->url('images/icons/'. $file_name);
        }

        unset($form['_token']);
        unset($form['_method']);
        $user->fill($form)->save();

        return redirect('/mypage')->with('flash_message', 'プロフィールを変更しました');
    }

}

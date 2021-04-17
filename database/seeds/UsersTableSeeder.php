<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
;
            DB::table('users')->insert([
                'name' => '山田太郎',
                'email' => 'example@sample.com',
                'introduction' => '会社員×フリーランスの複業家。すべての仕事をリモートワークでこなしています。SEOとSNSを駆使したコンテンツ運営が得意で、WordPressやWeb系言語を使ったWebサイト制作もしています。',
                'password' => bcrypt('guestuser'),
                'icon_img' => 'icon_sample01.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample2',
                'email' => 'ochazukeyaro3@gmail.com',
                'introduction' => '田舎住みアラサー主婦。旦那は転勤族✏。2019年度宅建受験予定勉強中。ドラゴンボールはベジータ派　ワンピースではサンジ推し。ミスチル。ゆず。スピッツ',
                'password' => bcrypt('password'),
                'icon_img' => 'icon_sample02.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample3',
                'email' => 'example3@sample.com',
                'introduction' => '2018年6月にツイッターをはじめたばかり。全てをなんとな〜く書いて、その後ほったらかしてました。苦笑
                ',
                'password' => bcrypt('password'),
                'icon_img' => 'icon_sample03.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample4',
                'email' => 'example4@sample.com',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample5',
                'email' => 'example5@sample.com',
                'introduction' => '『東京のクソ古くてクソ狭いマンションで暮らす、ミニマリストブログ運営。8月のPVは現在5万のりました！』',
                'password' => bcrypt('password'),
                'icon_img' => 'icon_sample05.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample6',
                'email' => 'example6@sample.com',
                'password' => bcrypt('password'),
                'icon_img' => 'icon_sample06.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample7',
                'email' => 'example7@sample.com',
                'password' => bcrypt('password'),
                'icon_img' => 'icon_sample07.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('users')->insert([
                'name' => 'sample8',
                'email' => 'example8@sample.com',
                'password' => bcrypt('password'),
                'icon_img' => 'icon_sample08.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

    }
}

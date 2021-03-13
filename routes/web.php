<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 認証middleware
Route::group(['middleware' => ['auth']], function () {
  Route::resource('post-idea', 'PostIdeasController');
  Route::get('myideas-list', 'IdeasListController@myidea')->name('myideas-list');
  Route::get('interests-list', 'IdeasListController@interest')->name('interest-ideas-list');
  Route::get('buy-ideas-list', 'IdeasListController@buyIdeas')->name('buy-ideas-list');
  Route::get('myidea-reviews', 'ReviewsController@toMeReviews');
  Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
  Route::get('password-edit', 'PasswordEditController@edit')->name('passwordEdit.edit');
  //商品購入
  Route::post('post-idea/buy/{id}', 'ShowIdeaController@buy')->name('buy');
  // レビュー投稿ページ
  Route::get('post-review/{id}', 'ReviewsController@postForm');
});

// テストページ
Route::get('test', 'TestController@get');


// トップページ

Route::get('about', 'LandingPageController@show');
Route::get('/', 'TopController@index')->name('index');
Route::get('/index', 'TopController@index')->name('index');

// アイデア詳細表示
Route::get('idea/{id}', 'ShowIdeaController@show');
Route::post('ajax/interest/{id}', 'Ajax\PostIdeasController@interest');
Route::get('ajax/interest/{id}', 'Ajax\PostIdeasController@changeInterest');
Route::get('ajax/idea-edit/{id}','Ajax\PostIdeasController@editAjax');

Route::post('post-idea/interest/{id}', 'PostIdeasController@interest');

// アイデアに対する口コミ
Route::get('ajax/reviews/{id}','Ajax\ReviewsController@show');
Route::post('reviews/{id}','ReviewsController@postreview');

// アイデア一覧表示
Route::get('all-ideas-list', 'IdeasListController@index')->name('all-ideas-list');
Route::post('all-ideas-list', 'IdeasListController@search');
Route::get('attention-ranking', 'IdeasListController@attentionRanking');
Route::get('selling-ranking', 'IdeasListController@sellingRanking');
Route::get('reviews-list', 'ReviewsController@index');

// 気になるの削除処理
Route::post('interests-list', 'IdeasListController@interestRemove');

//プロフィール変更
Route::post('/profile', 'ProfileController@update')->name('profile.update');

//パスワード変更
Route::post('password-edit', 'PasswordEditController@update')->name('passwordEdit.update');

// ユーザーページ
Route::get('user/{id}', 'IdeasListController@userIdeas');


Auth::routes();

Route::get('/mypage', 'MypageController@index')->name('mypage');

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

/*
|--------------------------------------------------------------------------
| 1) 認証不要
|--------------------------------------------------------------------------
*/

// 最初の画面
Route::get('/', function () {
    return view('login');
})->name('login');

// ログイン
Route::get('login', function () {
    return view('login');
})->name('login');

// 会員登録
Route::get('signup', function () {
    return view('signup');
});
Route::get('signup/form', function () {
    return view('signupForm');
})->name('signup.form');
Route::post('signup/form', 'AuthController@signup')->name('signup');

// 認証ルート
Route::post('login', 'AuthController@login')->name('auth.login');
Route::post('signup', 'AuthController@signup')->name('auth.signup');

// OAuth
Route::get('login/{provider}', 'AuthController@redirectTo');
Route::get('login/{provider}/callback', 'AuthController@handleProviderCallback');

/*
|--------------------------------------------------------------------------
| 2) User認可済み
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function () {
    
    // TOPページ
    Route::get('top', 'TopController@index')->name('top');

    // ログアウト
    Route::get('logout', 'AuthController@logout')->name('logout');

    // MyPage 1.会員情報
    Route::get('mypage/', 'MyPageController@index')->name('mypage');

    // PlayList 2.プレイリスト
    Route::get('playlist/', 'PlaylistController@index')->name('playlist');

    // Search 3.購入
    Route::get('search/', 'SearchController@index')->name('search');

    // Music 4.再生
    Route::get('music/', 'MusicController@index')->name('music');
    Route::get('music/search', 'MusicController@search')->name('music_search');
    Route::get('music/artist', 'MusicController@artist')->name('music_artist');

    // Hunt 5.ハント 
    Route::get('hunt/', 'HuntController@index')->name('hunt');

    // Report 6.通報
    Route::get('report/', 'ReportController@index')->name('report');
    Route::post('report/store', 'ReportController@store')->name('report_store');

    // Admin 7.管理
    Route::get('admin/', 'AdminController@index')->name('admin');


});

/*
|--------------------------------------------------------------------------
| 3) Admin認可済み 予定
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'admin'], function () {

});
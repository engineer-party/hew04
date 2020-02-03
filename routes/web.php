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

// トップページ
Route::get('/', 'TopController@index')->name('top');

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

// ログアウト
Route::get('logout', 'AuthController@logout')->name('logout');

// 認証ルート
Route::post('login', 'AuthController@login')->name('auth.login');
Route::post('signup', 'AuthController@signup')->name('auth.signup');

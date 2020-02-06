<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MyPageController extends Controller
{
    // MyPage出力処理
    public function index()
    {
        $user = Auth::user();
        return view('mypage',compact('user'));
    }
}

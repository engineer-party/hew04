<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TopController extends Controller
{
    // TOPページ出力処理
    public function index()
    {
        return view('top');
    }
  
    public function test()
    {
        return view('test');
    }
}

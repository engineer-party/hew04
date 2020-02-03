<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    // TOPページ出力処理
    public function index()
    {
        return view('top');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PlayListController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('playlist',compact('user'));
    }
}

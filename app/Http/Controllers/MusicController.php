<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MusicController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('music',compact('user'));
    }
}

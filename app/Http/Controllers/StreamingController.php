<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StreamingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('streaming',compact('user'));
    }
}

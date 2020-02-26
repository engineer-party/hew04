<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HuntController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('hunt',compact('user'));
    }
}

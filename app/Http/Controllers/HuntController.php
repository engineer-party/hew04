<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HuntController extends Controller
{

    public function index()
    {
        $api_key = "AIzaSyAdgA4uMkD2gNnAWjutaqZrvdQTIyUE3UY";
        $user = Auth::user();
        return view('hunt',compact('user'));
    }
}

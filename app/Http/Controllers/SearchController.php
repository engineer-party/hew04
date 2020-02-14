<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SearchController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('search',compact('user'));
    }
}

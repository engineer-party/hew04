<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('library',compact('user'));
    }
}

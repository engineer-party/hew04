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
    
  
    public function ajaxplaylist_get()
    {
      $user = Auth::user();
      return view('playlist',compact('user'));
    }
  
    public function ajaxmusic_get()
    {
      $user = Auth::user();
      return view('music',compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Music;

class MusicUploadController extends Controller
{
  public function index(){
    return view('music_upload');
  }
}

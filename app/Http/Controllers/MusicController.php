<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Genre;
use App\Models\User;
use App\Models\Playlist;

class MusicController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('music',compact('user'));
    }
}

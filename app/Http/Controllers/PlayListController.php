<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlist = 1;
        return view('playlist_musics',compact('playlist'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    public function index($playlist_id)
    {
        $playlist = Playlist::find($playlist_id)->get();
        $musics = $playlist->musics()->get();

        return view('playlist_musics',compact('playlist','musics'));
    }

}

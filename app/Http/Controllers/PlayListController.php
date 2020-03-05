<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Playlist;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    public function index($playlist_id)
    {
        $playlist = Playlist::find($playlist_id);
        $musics = $playlist->musics()->get();

        $cnt = 1;

        foreach ($playlist->musics()->take(4)->get() as $music){
            $playlist['img'. $cnt] = Storage::disk('s3')->url('image/music/' . $music->img_url);
            $cnt++;
        }
        for ($cnt; $cnt <= 4; $cnt++) { 
            $playlist['img'. $cnt] = asset('img/playlists.png');
        }

        return view('playlist_musics',compact('playlist','musics'));
    }

}

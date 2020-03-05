<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Playlist;
use Illuminate\Support\Facades\Storage;

class StreamingController extends Controller
{
    public function index()
    {
        // ログイン中のユーザーが作成したプレイリスト一覧
        $playlists = User::find(Auth::user()->id)->playlists()->withCount('musics')->get();
        foreach ($playlists as $playlist){
            $cnt = 1;
            foreach ($playlist->musics()->take(4)->get() as $music){
                $playlist['img'. $cnt] = Storage::disk('s3')->url('image/music/' . $music->img_url);
                $cnt++;
            }
            for ($cnt; $cnt <= 4; $cnt++) { 
                $playlist['img'. $cnt] = asset('img/playlists.png');
            }
        }
        return view('streaming',compact('playlists'));
    }
}

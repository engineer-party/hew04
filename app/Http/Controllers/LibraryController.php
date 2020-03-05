<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Playlist;
use App\Models\PlaylistMusic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LibraryController extends Controller
{
    public function index()
    {
      $musics = User::find(Auth::user()->id)->musics()->orderBy('created_at','DESC')->get();

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

      return view('library',compact('musics','playlists'));
    }

    public function playlist(Request $req)
    {

      $validator = Validator::make($req->all(), [
        'playlist_name' => 'required',
      ]);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->errors())->withInput($req->all);
      }

      $playlist = new Playlist;
      $playlist->user_id = Auth::user()->id;
      $playlist->name = $req->playlist_name;
      $playlist->save();
      
      return redirect()->route('library')->with('message', 'プレイリスト作成完了');
    }

    public function add(Request $req)
    {
      $playlistMusic = new PlaylistMusic;
      $playlistMusic->playlist_id = $req->playlist_id;
      $playlistMusic->music_id = $req->music_id;
      $playlistMusic->order = PlaylistMusic::where('playlist_id',$req->playlist_id)->count() + 1;
      $playlistMusic->save();
      
      return redirect()->route('library')->with('message', 'プレイリスト追加完了');
    }
    
}

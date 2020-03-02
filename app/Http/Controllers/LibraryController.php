<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Playlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class LibraryController extends Controller
{
    public function index()
    {
      $musics = User::find(Auth::user()->id)->musics()->orderBy('created_at','DESC')->get();
      // 割引適用処理
      foreach ($musics as $music){
        // この曲の割引情報が存在するか
        if (Campaign::where('music_id',$music->id)->exists()) {
            // キャンペーン情報を取得
            $campaign = Campaign::where('music_id',$music->id)->first();
            // キャンペーン期間中であるか
            if ($campaign->end_date_time > Carbon::now()){
                $music->price -= round($music->price * ($campaign->discount / 100),-1);
            }
            // キャンペーンが終了している場合レコード物理削除
            else {
                Campaign::where('music_id',$music->id)->delete();
            }
        }
      }

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
      $playlist = new Playlist;
      $playlist->user_id = Auth::user()->id;
      $playlist->name = $req->name;
      $playlist->save();
      
      return redirect()->route('library')->with('message', 'プレイリスト作成完了');
    }
    
}

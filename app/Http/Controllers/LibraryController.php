<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Playlist;
use Carbon\Carbon;

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
      
      return view('library',compact('musics'));
    }

    public function playlist(Request $req)
    {
      
      
      return redirect()->route('library')->with('message', 'プレイリスト作成完了');
    }
    
}

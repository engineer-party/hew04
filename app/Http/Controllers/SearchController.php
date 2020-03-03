<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Music;
use App\Models\Campaign;
use App\Models\Genre;
use App\Models\Artist;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function index(Request $req)
    {
        $artists = Artist::where('name', 'LIKE', "%$req->search%")->take(4)->get();
        $musics = Music::where('name', 'LIKE', "%$req->search%")->take(5)->get();

        if($req->search == null){
            $req->search = 'ALL MUSICS';
        }

        return view('search',compact('musics','artists','req'));
    }

    public function genre($genre_id)
    {
        $musics = Genre::find($genre_id)->musics()->take(10)->get();
        $genre = Genre::find($genre_id)->first()->name;

        return view('search_genre',compact('musics','genre'));
    }

    public function artist($name)
    {
        if (!$name = 'ALL MUSICS'){
            $artists = Artist::where('name', 'LIKE', "%$name%")->get();
        } else {
            $artists = Artist::All();
        }

        $more = 'artist';

        return view('search_more',compact('artists','name','more'));
    }

    public function music($name)
    {
        if (!$name = 'ALL MUSICS'){
            $musics = Music::where('name', 'LIKE', "%$name%")->get();
        } else {
            $musics = Music::All();
        }

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
        $more = 'music';

        return view('search_more',compact('musics','name','more'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Music;

class MusicController extends Controller
{
    public function index()
    {
        // ログイン中のユーザーが購入した曲一覧
        $musics = User::find(Auth::user()->id)->musics;

        return view('music',compact('musics'));
    }

    // 購入した曲の検索・並び替え
    public function search(Request $req)
    {
        // ログイン中のユーザーが購入した曲一覧
        $musics = User::find(Auth::user()->id)->musics;

        // 検索処理
        
        return view('music',compact('musics'));
    }

    public function artist()
    {
        // ログイン中のユーザーが購入した曲のアーティスト一覧
        $musics = User::find(Auth::user()->id)->musics;
        $artists = [];
        foreach ($musics as $music){
            $artists[] = Music::find($music->artist_id)->artist()->first();
        }
        // この曲を歌っているアーティスト
        // $artist = Music::find(1)->artist()->first();
        // dd($artist->name);
        return view('music',compact('musics'));
    }
}

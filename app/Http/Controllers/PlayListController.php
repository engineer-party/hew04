<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class PlaylistController extends Controller
{
    public function index()
    {
        // ログイン中のユーザーが作成したプレイリスト一覧
        $playlists = User::find(Auth::user()->id)->playlists;

        return view('playlist',compact('playlists'));
    }

}

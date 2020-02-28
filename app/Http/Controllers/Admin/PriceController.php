<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Music;
use App\Models\Artist;

class PriceController extends Controller
{
    public function index()
    {
        $artists = Artist::All();
        $musics = Music::All();
        return view('Admin\price',compact('artists','musics'));
    }

    public function artist(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'artist' => 'required',
            'price' => 'required|alpha_dash',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($req->all);
        }

        return redirect()->route('information')->with('message', 'お知らせ送信完了！');
    }

    public function music(Request $req)
    {

    }
}

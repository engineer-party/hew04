<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Music;
use App\Models\Artist;
use App\Models\Campaign;
use Illuminate\Support\Facades\Validator;

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
            'artist_discount' => 'required|numeric',
            'artist_period' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($req->all);
        }
        // キャンペーン保存)
        $information = new Campaign;
        $information->title = $req->title;
        $information->content = $req->content;
        $information->save();

        return redirect()->route('price')->with('message', 'アーティスト値下げ完了！');
    }

    public function music(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'music' => 'required',
            'music_discount' => 'required|numeric',
            'music_period' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($req->all);
        }

        return redirect()->route('price')->with('message', '楽曲値下げ完了！');
    }
}

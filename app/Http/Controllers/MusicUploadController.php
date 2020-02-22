<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Music;

class MusicUploadController extends Controller
{
  public function index()
  {
    //ジャンルの全件取得
    $genres = Genre::all();
    //アーティストの(ry
    $artists = Artist::all();
    return view('music_upload', compact('genres', 'artists'));
  }

  public function musicStore(Request $request)
  {
    $music = Music::create([
      'artist_id'   => $request->artist,
      'genre_id'    => $request->genre,
      'name'        => $request->name,
      'time'        => $request->artist,
      'price'       => $request->price,
      'release_date'=> $request->date,
    ]);
    return view('music_upload', compact('genres', 'artists'));
  }
}

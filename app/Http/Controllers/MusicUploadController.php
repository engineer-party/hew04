<?php
namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Music;
use getID3;
use getid3_lib;

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
    $getID3 = new getID3();
    $music_info = $getID3->analyze("music/test.mp3");
    //getid3_lib::CopyTagsToComments($music_info);
    dd($music_info);
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

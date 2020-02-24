<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Genre;
use App\Models\Music;
use getID3;
use getid3_lib;
use falahati\PHPMP3\MpegAudio;

class MusicUploadController extends Controller
{
  public function index()
  {
    //ジャンルの全件取得
    $genres = Genre::all();
    //アーティストの(ry
    $artists = Artist::all();
    //楽曲(ry
    $musics = Music::all();
    return view('music_upload', compact('genres', 'artists', 'musics'));
  }

  public function musicStore(Request $request)
  {
    $mp3_file_name = $request->file('musicfile')->getClientOriginalName();
    $img_file_name = $request->file('imgfile')->getClientOriginalName();
    $mp3 = new MpegAudio();
    if (app()->isLocal()) {
      $request->file('musicfile')->storeAs('public/music', $mp3_file_name);
      $request->file('imgfile')->storeAs('public/image', $img_file_name);
      $mp3->fromFile('storage/music/'.$mp3_file_name)->trim(10, 30)->saveFile('storage/sample/sample_'.$mp3_file_name);
    } else {
      Storage::disk('s3')->putFileAs('music/', $request->file('musicfile'), $mp3_file_name, 'public');
      Storage::disk('s3')->putFileAs('image/', $request->file('imgfile'), $img_file_name, 'public');
      Storage::disk('s3')->putFileAs('sample/', $mp3->fromFile(Storage::disk('s3')->url('music/'.$mp3_file_name))->trim(10, 30), 'sample_'.$mp3_file_name, 'public');
    }
    $getID3 = new getID3();
    $getID3->setOption(array('encoding' => 'UTF-8'));
    $music_info = $getID3->analyze('storage/music/' . $mp3_file_name);
    getid3_lib::CopyTagsToComments($music_info);
    /*
      $music = Music::create([
        'artist_id'    => $request->artist,
        'name'         => $request->name,
        'time'         => $music_info['playtime_string'],
        'price'        => $request->price,
        'img_url'      => 
        'music_url'    => 
        'sample_url'   => 
      ]);
      */
    return redirect()->route('music_upload')->with('message', 'musicアップロード成功！');
  }

  public function genreStore(Request $request)
  {
    Genre::create([
      'name' => $request->name,
    ]);
    return redirect()->route('music_upload')->with('message', 'ジャンル登録成功！');
  }

  public function artistStore(Request $request)
  {
    Artist::create([
      'genre_id'    => $request->genre,
      'name'        => $request->name,
      'description' => $request->detail,
    ]);
    return redirect()->route('music_upload')->with('message', 'アーティスト登録成功！');
  }
}

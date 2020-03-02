<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artist;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Genre;
use App\Models\Music;
use App\Models\GenreMusicTable;
use App\Http\Controllers\Controller;
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
    //力技
    $page = true;
    return view('admin/music_upload', compact('genres', 'artists', 'musics', 'page'));
  }

  public function musicStore(Request $request)
  {
    //それぞれのファイル名を取得
    $mp3_file = $request->file('files')[0];
    $mp3_file_name = $mp3_file->getClientOriginalName();
    $img_file = $request->file('files')[1];
    $img_file_name = $img_file->getClientOriginalName();

    // アップロードされた拡張子を取得
    $mp3_extension = File::extension($mp3_file_name);
    $img_extension = File::extension($img_file_name);

    //sampleを取得するためのやつ
    $mp3 = new MpegAudio();

    //一旦ローカルに保存
    $request->file('files')[0]->storeAs('public/music/', $mp3_file_name);
    $request->file('files')[1]->storeAs('public/image/music/', $img_file_name);
    $mp3->fromFile('storage/music/'.$mp3_file_name)->trim(10, 30)->saveFile('storage/sample/sample_'.$mp3_file_name);

    //mp3から再生時間の取得
    $getID3 = new getID3();
    $getID3->setOption(array('encoding' => 'UTF-8'));
    $music_info = $getID3->analyze('storage/music/' . $mp3_file_name);
    getid3_lib::CopyTagsToComments($music_info);

    $id = Music::orderby('id', 'desc')->first()->id + 1;

    //DBにぶち込む
    $music = Music::create([
      'artist_id'    => $request->artist,
      'name'         => $request->name,
      'time'         => $music_info['playtime_string'],
      'price'        => $request->price,
      'img_url'      => $id . "." . $img_extension,
      'music_url'    => $id . "." . $mp3_extension,
      'sample_url'   => "sample_" . $id . "." . $mp3_extension,
    ]);

    foreach ($request->genres as $genre) {
      $genre_music = new GenreMusicTable;
      $genre_music->fill([
        'music_id' => $music->id,
        'genre_id' => $genre,
      ]);
      $genre_music->save();
    }

    //S3のパス
    $mp3_storePath = "music/" . $music->id . "." . $mp3_extension;
    $img_storePath = "image/music/" . $music->id . "." . $img_extension;
    $sample_storePath = "music/sample/sample_" . $music->id . "." . $mp3_extension;

    //一旦ローカルに上げたファイルの読み込み
    $mp3_storefile = Storage::get('public/music', $mp3_file_name);
    $img_storefile = Storage::get('public/image/music/', $img_file_name);
    $sample_storefile = Storage::get('public/sample/sample_'.$mp3_file_name);

    //S3にぶち込む
    Storage::disk('s3')->put($mp3_storePath, $mp3_storefile, 'public');
    Storage::disk('s3')->put($img_storePath, $img_storefile, 'public');
    Storage::disk('s3')->put($sample_storePath, $sample_storefile, 'public');

    //一旦ローカルに上げたファイルの削除
    File::delete('storage/music/' . $mp3_file_name);
    File::delete('storage/image/music/' . $img_file_name);
    File::delete('storage/sample/sample_' . $mp3_file_name);

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
    // 画像ファイルを変数に取り込む
    $imagefile = $request->file('file');
    // アップロードされた拡張子を取得
    $extension = File::extension($imagefile->getClientOriginalName());

    $id = Artist::orderby('id', 'desc')->first()->id + 1;

    $filename = 'artist_'.$id.'.'.$extension;
    $artist = Artist::create([
      'genre_id'    => $request->genre,
      'name'        => $request->name,
      'description' => $request->detail,
      'img_url'     => $filename,
    ]);

    // S3の保存先のパスを生成
    $storePath = "artist/image/artist_" . $artist->id . "." . $extension;
    // 画像を横幅は300px、縦幅はアスペクト比維持の自動サイズへリサイズ
    $image = Image::make($imagefile)
      ->resize(300, null, function ($constraint) {
        $constraint->aspectRatio();
      });
    // S3に保存。ファイル名は$storePathで定義したとおり
    Storage::disk('s3')->put($storePath, (string) $image->encode(), 'public');
    
    return redirect()->route('music_upload')->with('message', 'アーティスト登録成功！');
  }
}

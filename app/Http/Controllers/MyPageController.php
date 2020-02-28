<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class MyPageController extends Controller
{
  // MyPage出力処理
  public function index()
  {
    $user = Auth::user();
    return view('mypage', compact('user'));
  }

  public function update(Request $request)
  {
    /*
    $img_file_name = $request->file('file')->getClientOriginalName();
    if (app()->isLocal()) {
      $request->file('file')->storeAs('public/image/user', $img_file_name);
    } else {
      Storage::disk('s3')->putFileAs('image/user', $request->file('imgfile'), $img_file_name, 'public');
    }
    */
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:100',
      'email' => 'required|email|max:191|unique:users,email,' . Auth::user()->id,
      'image' => 'file|image|max:4000',
      //'password' => 'required|string|min:8|max:191',
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    if ($request['image']) {
      // 画像ファイルを変数に取り込む
      $imagefile = $request->file('image');
      // ファイル名のタイムスタンプに使う
      $now = date_format(Carbon::now(), 'YmdHis');
      // アップロードされたファイル名を取得
      $name = $imagefile->getClientOriginalName();
      // S3の保存先のパスを生成
      $storePath = "image/user/" . $now . "_" . $name;
      // 画像を横幅は300px、縦幅はアスペクト比維持の自動サイズへリサイズ
      $image = Image::make($imagefile)
        ->resize(300, null, function ($constraint) {
          $constraint->aspectRatio();
        });
      // S3に保存。ファイル名は$storePathで定義したとおり
      Storage::disk('s3')->put($storePath, (string) $image->encode(), 'public');
    }

    $user = User::where('id', Auth::user()->id)
      ->update([
        'name'  => $request->name,
        'email' => $request->email,
      ]);

    return redirect()->route('mypage')->with('message', '変更完了');
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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
    $img_file_name = $request->file('file')->getClientOriginalName();
    if (app()->isLocal()) {
      $request->file('file')->storeAs('public/image/user', $img_file_name);
    } else {
      Storage::disk('s3')->putFileAs('image/user', $request->file('imgfile'), $img_file_name, 'public');
    }
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:100',
      'email' => 'required|email|max:191|unique:users,email,' . Auth::user()->id,
      //'password' => 'required|string|min:8|max:191',
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors())->withInput();
    }

    $user = User::where('id', Auth::user()->id)
      ->update([
        'name'  => $request->name,
        'email' => $request->email,
      ]);

    return redirect()->route('mypage')->with('message', '変更完了');
  }

  public function resize()
  {
    //アップロードしたファイルをファイル名を変えずにimagesに保存
    if (is_uploaded_file($_FILES['upload_file']['tmp_name'])) {
      move_uploaded_file($_FILES['upload_file']['tmp_name'], './images/' . $_FILES['upload_file']['name']);
    } else {
      echo 'ファイルが選択されていません。';
      return false;
    }

    //元になる画像の情報を取得
    $file = 'public/image/user' . $_FILES['upload_file']['name'];
    $result = getimagesize($file);
    list($img_width, $img_height, $img_type) = $result;

    //メモリにコピー
    switch ($img_type) {
      case 1:
        $img_in = imagecreatefromgif($file); //gif用
        break;
      case 2:
        $img_in = imagecreatefromjpeg($file); //jpg用
        break;
      case 3:
        $img_in = imagecreatefrompng($file); //png用
        break;
      default:
        return false;
    }

    $max_width = 375; // 最大横幅
    $max_height = 375; // 最大縦幅
    $w = $img_width / $max_width; //元：新の比率計算(width)
    $h = $img_height / $max_height; //元：新の比率計算(height)

    if ($h < $w) { //width比の方が大きい場合
      $max_height = $img_height / $w;
      $max_width = $img_width / $w;
    } elseif ($w < $h) { //height比の方が大きい場合
      $max_width = $img_width / $h;
      $max_height = $img_height / $h;
    } elseif ($w == $h) { //比率が同じ場合
      $max_width = $img_width / $w;
      $max_height = $img_height / $h;
    }

    //空の画像作成
    $img_out = imagecreatetruecolor($max_width, $max_height);
    //アルファ設定
    imagealphablending($img_out, false);
    imagesavealpha($img_out, true);

    //新しい画像を指定サイズで作成
    imagecopyresampled($img_out, $img_in, 0, 0, 0, 0, $max_width, $max_height, $img_width, $img_height);

    //新しい画像を元のファイル名でresize_imagesに保存
    switch ($img_type) {
      case 1:
        imagegif($img_out, './resize_images/' . $_FILES['upload_file']['name']); //gif用
        break;
      case 2:
        imagejpeg($img_out, './resize_images/' . $_FILES['upload_file']['name']); //jpg用
        break;
      case 3:
        imagepng($img_out, './resize_images/' . $_FILES['upload_file']['name']); //png用
        break;
      default:
        return false;
    }

    // 画像データ削除
    imagedestroy($img_in);
    imagedestroy($img_out);
  }
}

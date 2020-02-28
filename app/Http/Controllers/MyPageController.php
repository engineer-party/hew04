<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:100',
      'email' => 'required|email|max:191|unique:users,email,'.Auth::user()->id,
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
}

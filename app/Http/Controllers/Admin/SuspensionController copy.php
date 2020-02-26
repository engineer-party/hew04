<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class SuspensionController extends Controller
{
    public function index()
    {
        $users = User::onlyTrashed()->get();
        return view('Admin\suspension',compact('users'));
    }

    // アカウント停止解除
    public function restore($user_id){
        User::onlyTrashed()->find($user_id)->restore();
        return redirect()->route('suspension')->with('message', 'アカウント停止解除！');
    }
}

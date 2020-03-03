<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Information;
use App\Models\User;
use App\Models\UserInformation;

class InformationController extends Controller
{
    public function index()
    {
        return view('admin\information',compact(''));
    }

    public function send($user_id)
    {
        return redirect()->route('information')->with('user_id', $user_id);
    }

    // お知らせをDBに保存してリレーション
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required',
            'to' => 'required|alpha_dash',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($req->all);
        }
        if (!($req->to == 'all' || is_numeric($req->to))) {
            return redirect()->back()->withErrors($validator->errors())->withInput($req->all)->with('message', '宛先コードが存在しません！');
        }
        // お知らせ保存)
        $information = new Information;
        $information->title = $req->title;
        $information->content = $req->content;
        $information->save();
        // リレーション
        if ($req->to == 'all'){
            $count = User::withTrashed()->count();
            for ($i=1; $i <= $count ; $i++) { 
                $userInformation = new UserInformation;
                $userInformation->user_id = $i;
                $userInformation->information_id = $information->id;
                $userInformation->save();
            }
        }
        else if(is_numeric($req->to) ){
            $userInformation = new UserInformation;
            $userInformation->user_id = $req->to;
            $userInformation->information_id = $information->id;
            $userInformation->save();
        }

        return redirect()->route('information')->with('message', 'お知らせ送信完了！');
    }
}

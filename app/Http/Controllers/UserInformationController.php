<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Information;
use App\Models\User;
use DB;

class UserInformationController extends Controller
{
    public function index()
    {
        $data = User::find(Auth::user()->id)->informations()->orderBy('created_at','DESC')->get();
        return view('userinformation',compact('data'));
    }
}

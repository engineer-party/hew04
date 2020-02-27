<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Music;
use App\Models\Artist;

class SalesController extends Controller
{
    public function index()
    {
        $musics = Music::withCount('buyUsers')->orderBy('buy_users_count','DESC')->paginate(10, ["*"], 'musics');

        return view('Admin\sales',compact('musics'));
    }
}

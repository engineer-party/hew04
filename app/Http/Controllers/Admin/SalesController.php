<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Music;
use App\Models\Artist;
use Illuminate\Support\Facades\Input;

class SalesController extends Controller
{
    public function index()
    {
        $musics = Music::withCount('buyUsers')->orderBy('buy_users_count','DESC')
            ->paginate(10, ["*"], 'musics')->appends(["itempage" => Input::get('artists')]);
        $artists = Artist::withCount('musics')->orderBy('musics_count','DESC')
            ->paginate(10, ["*"], 'artists')->appends(["itempage" => Input::get('musics')]);
        

        return view('Admin\sales',compact('musics','artists'));
    }
}

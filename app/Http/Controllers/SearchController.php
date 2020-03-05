<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Music;
use App\Models\Campaign;
use App\Models\Genre;
use App\Models\Artist;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function index(Request $req)
    {
        $artists = Artist::where('name', 'LIKE', "%$req->search%")->take(4)->get();
        $musics = Music::where('name', 'LIKE', "%$req->search%")->take(5)->get();

        if($req->search == null){
            $req->search = 'ALL MUSICS';
        }

        $more = 'no';

        return view('search',compact('musics','artists','req','more'));
    }

    public function genre($genre_id)
    {
        $musics = Genre::find($genre_id)->musics()->take(10)->get();
        $genre = Genre::find($genre_id)->first()->name;

        $more = 'genre';

        return view('search',compact('musics','genre','more','genre_id'));
    }

    public function genreMore($genre_id)
    {
        $musics = Genre::find($genre_id)->musics()->get();
        $genre = Genre::find($genre_id)->first()->name;

        $more = 'genreMore';

        return view('search',compact('musics','genre','more'));
    }

    public function artist($name)
    {
        if (!$name = 'ALL MUSICS'){
            $artists = Artist::where('name', 'LIKE', "%$name%")->get();
        } else {
            $artists = Artist::All();
        }

        $more = 'artist';

        return view('search',compact('artists','name','more'));
    }

    public function music($name)
    {
        if (!$name = 'ALL MUSICS'){
            $musics = Music::where('name', 'LIKE', "%$name%")->get();
        } else {
            $musics = Music::All();
        }

        $more = 'music';

        return view('search',compact('musics','name','more'));
    }

    public function artistMusic($artist_id)
    {
        $musics = Artist::find($artist_id)->musics()->get();
        $name = Artist::find($artist_id)->first()->name;
        $more = 'artist_music';

        return view('search',compact('musics','name','more'));
    }

    public function campaign($campaign_name)
    {
        $musics = Music::whereHas('Campaign', function($q)use($campaign_name){
            $q->where('name', $campaign_name);
        })->get();
        
        $name = $campaign_name;
        $more = 'campaign_music';

        return view('search',compact('musics','name','more'));
    }
}

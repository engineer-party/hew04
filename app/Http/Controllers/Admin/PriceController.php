<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Music;
use App\Models\Artist;
use App\Models\Campaign;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PriceController extends Controller
{
    public function index()
    {
        $pars = [5,10,15,20,25,30,35,40,45,50];
        $artists = Artist::All();
        $musics = Music::All();
        return view('Admin\price',compact('artists','musics','pars'));
    }

    public function salesArtist($artist_id)
    {
        return redirect()->route('price')->with('artist_id', $artist_id);
    }

    public function salesMusic($music_id)
    {
        return redirect()->route('price')->with('music_id', $music_id);
    }

    public function artist(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'artist' => 'required',
            'artist_discount' => 'required',
            'artist_period' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($req->all);
        }
        // 終了日
        if (mb_substr($req->artist_period, -1) == 'd'){
            $today = Carbon::today(); // 今日の00時00分
            $end_date_time = $today->addDays(substr($req->artist_period, 0, -1));
        } 
        else {
            $now = Carbon::now(); // 現在日時
            $end_date_time = $now->addMinutes(substr($req->artist_period, 0, -1));
        }
        // キャンペーン保存
        $musics = Artist::find($req->artist)->musics()->get();
        foreach ($musics as $music){
            if (Campaign::where('music_id',$music->id)->exists()) {
                Campaign::where('music_id',$music->id)->delete();
            }
            $campaign = new Campaign;
            $campaign->music_id = $music->id;
            $campaign->discount = $req->artist_discount;
            $campaign->end_date_time = $end_date_time;
            $campaign->save();
        }

        return redirect()->route('price')->with('message', 'アーティスト値下げ完了！');
    }

    public function music(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'music' => 'required',
            'music_discount' => 'required',
            'music_period' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($req->all);
        }
        // 終了日
        if (mb_substr($req->music_period, -1) == 'd'){
            $today = Carbon::today(); // 今日の00時00分
            $end_date_time = $today->addDays(substr($req->music_period, 0, -1));
        } 
        else {
            $now = Carbon::now(); // 現在日時
            $end_date_time = $now->addMinutes(substr($req->music_period, 0, -1));
        }
        
        if (is_numeric($req->music)){
            // キャンペーン保存
            $music = Music::find($req->music);
            if (Campaign::where('music_id',$music->id)->exists()) {
                Campaign::where('music_id',$music->id)->delete();
            }

            $campaign = new Campaign;
            $campaign->music_id = $music->id;
            $campaign->discount = $req->music_discount;
            $campaign->end_date_time = $end_date_time;
            $campaign->save();
        }
        else {
            if ($req->music == 'all'){
                $musics = Music::All();
                foreach ($musics as $music){
                    if (Campaign::where('music_id',$music->id)->exists()) {
                        Campaign::where('music_id',$music->id)->delete();
                    }

                    $campaign = new Campaign;
                    $campaign->music_id = $music->id;
                    $campaign->discount = $req->music_discount;
                    $campaign->end_date_time = $end_date_time;
                    $campaign->save();
                }
            }
        }

        return redirect()->route('price')->with('message', '楽曲値下げ完了！');
    }
}

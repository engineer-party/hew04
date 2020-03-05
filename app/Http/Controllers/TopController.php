<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Campaign;
use Illuminate\Support\Carbon;

class TopController extends Controller
{
    // TOPページ出力処理
    public function index()
    {  
        $campaigns = Campaign::All();
        foreach ($campaigns as $campaign){
            if ($campaign->end_date_time < Carbon::now()) {
                $campaign->delete();
            }
        } 
        $campaigns = $campaigns->unique('name');
        return view('top',compact('campaigns'));
    }
  
    public function test()
    {
        return view('test');
    }
}

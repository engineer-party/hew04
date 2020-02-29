<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PointController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('point',compact('user'));
    }
}

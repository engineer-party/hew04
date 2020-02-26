<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Music;

class SalesController extends Controller
{
    public function index()
    {
        $musics = Music::all();
        return view('Admin\sales',compact('users'));
    }
}

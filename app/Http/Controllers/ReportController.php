<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ReportController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('report',compact('user'));
    }
}

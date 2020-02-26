<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformationController extends Controller
{
    public function index()
    {
        return view('Admin\information',compact(''));
    }
}

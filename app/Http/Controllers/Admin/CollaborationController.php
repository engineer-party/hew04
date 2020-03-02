<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollaborationController extends Controller
{
    public function index()
    {
        return view('admin/collaboration',compact(''));
    }
}

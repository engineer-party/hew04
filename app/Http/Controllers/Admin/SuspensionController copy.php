<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class SuspensionController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Admin\suspension',compact('users'));
    }
}

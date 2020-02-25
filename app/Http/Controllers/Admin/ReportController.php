<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ReportController extends Controller
{
    public function index()
    {
        // User一覧通報数が多い順
        $users = User::withCount('targetReports')
            ->orderBy('target_reports_count', 'desc')
            ->get();
        return view('Admin\report',compact('users'));
    }
}

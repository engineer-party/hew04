<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Report;

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

    // レポート詳細
    public function show($user_id,$category_id)
    {
        $categories = [
            '不適切な画像',
            '不適切な名前',
            'データの改ざん',
            '位置情報改ざん',
            'その他',
        ];
        // 通報検索
        if ($category_id < 6){
            $where = [
                ['target_id','=',$user_id],
                ['category_id','=',$category_id],
            ];
            $title = $categories[$category_id - 1] . 'の通報';
        } 
        elseif ($category_id == 6){
            $where = [
                ['target_id','=',$user_id],
            ];
            $title = '全ての通報';
        }
        else {
            $where = [
                ['sender_id','=',$user_id]
            ];
            $title = '投稿した通報';
        }
        // レポート取得
        $reports = Report::where($where)->orderBy('created_at','desc')->get();
        $title = [
            'name' => User::withTrashed()->find($user_id)->name,
            'title' => $title,
        ];

        return view('Admin\report_show',compact('reports','categories','title'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BuyMusic;

class AdminController extends Controller
{
    public function index()
    {
        // Point OR Cash 円グラフ
        $buyMusic = BuyMusic::All();
        $totalPoint = $buyMusic->sum('point');
        $totalCash = $buyMusic->sum('price');
        $totalPay = $totalPoint + $totalCash;
        $pointOrCash = [
            'totalPay' => $totalPay,
            'totalPoint' => $totalPoint,
            'totalCash' => $totalCash,
            'parPoint' => $this->funcNumPar($totalPoint,$totalPay),
            'parCash' => $this->funcNumPar($totalCash,$totalPay),
        ];

        return view('Admin\admin',compact('pointOrCash'));
    }

    // パーセント計算
    public function funcNumPar($num,$total){
        $par = round(($num / $total) * 100);
        return $par;
    }
}

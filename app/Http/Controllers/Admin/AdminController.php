<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BuyMusic;
use App\Models\BuyPoint;

class AdminController extends Controller
{
    public function index()
    {
        // AWSサーバー稼働率 チャート
        $vals = $this->awsGet();
        // ポイントキャッシュ割合 割合グラフ
        $buyPoints = BuyPoint::All();
        $totalBuyPointPrice = $buyPoints->sum('price');
        $totalBuyPoint = $buyPoints->sum('point');
        $buyPointGraph = [
            'totalBuyPointPrice' => $totalBuyPointPrice,
            'totalBuyPoint' => $totalBuyPoint,
            'buyPointPar' => $this->funcNumPar($totalBuyPoint - $totalBuyPointPrice,$totalBuyPoint),
        ];
        // 支払方法割合 円グラフ
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
        // 1週間の売り上げ
        $days = [];
        for ($i=6; $i >= 0; $i--) {
            $date = $i * -1 .' day';
            $dayPoint = BuyMusic::whereDate('created_at', date('Y-m-d',strtotime($date)))->sum('price');
            $dayCash = BuyPoint::whereDate('created_at', date('Y-m-d',strtotime($date)))->sum('price');;
            $days[] = $dayPoint + $dayCash;
        }

        return view('admin/admin',compact('pointOrCash','vals','buyPointGraph','days'));
    }

    // パーセント計算
    public function funcNumPar($num,$total){
        if (!$total == 0){
            $par = round(($num / $total) * 100);
        }
        else {
            $par = 0;
        }
        return $par;
    }

    // AWS取得
    public function awsGet(){
        $region = "ap-northeast-1";
        $region_set = putenv('AWS_DEFAULT_REGION=' . $region);
        //計測開始時間
        $start_time = date('Y-m-d',strtotime("-15 hour")).'T'.date('H:i:s',strtotime("-15 hour"));
        //計測終了時間
        $end_time = date('Y-m-d',strtotime("-9 hour")).'T'.date('H:i:s',strtotime("-9 hour"));
        //計測間隔 例)600 = 10分
        $period = '600';
        //ローカルでも動きます。
        if (app()->isLocal()) {
        $cmd = '"C:\Program Files\Amazon\AWSCLI\aws.exe" cloudwatch get-metric-statistics --metric-name CPUUtilization --start-time '.$start_time.' --end-time '.$end_time.' --period '.$period.' --namespace AWS/EC2 --statistics Average --dimensions Name=InstanceId,Value=i-0359d4d97c4e4c85f --query "sort_by(Datapoints,&Timestamp)[*]" 2>&1';
        exec($cmd, $val_array, $var);
        mb_convert_variables('UTF-8','SJIS-win',$val);
        } else {
        $cmd = '/usr/bin/aws cloudwatch get-metric-statistics --metric-name CPUUtilization --start-time '.$start_time.' --end-time '.$end_time.' --period '.$period.' --namespace AWS/EC2 --statistics Average --dimensions Name=InstanceId,Value=i-0359d4d97c4e4c85f --query "sort_by(Datapoints,&Timestamp)[*]" 2>&1';
        exec($cmd, $val_array, $var);
        }

        //JSONで返ってくると思っていたが
        //実際にはJSONっぽい謎の配列が返ってきたので
        //使いやすい形に整形
        foreach($val_array as $key => $val){
        if(strpos($val,"{") !== false || strpos($val,"}") !== false || strpos($val,"[") !== false || strpos($val,"]") !== false){
            unset($val_array[$key]);
        }else{
            $val_array[$key] = str_replace(array(" ","\"",","),"",$val);
        }
        }
        $val_array = array_values($val_array);
        unset($val_array[count($val_array)-1]);
        $cnt = -1;
        foreach($val_array as $key => $val){
        if($key % 3 == 0){
            $cnt++;
        }
        $val_new[$cnt][strstr($val,":",true)] = ltrim(strstr($val,":"),":");
        }

        return $val_new;
    }
}

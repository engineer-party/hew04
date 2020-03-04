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
        // AWSグラフ
        $vals = $this->awsGet();
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

        return view('admin/admin',compact('pointOrCash','vals'));
    }

    // パーセント計算
    public function funcNumPar($num,$total){
        $par = round(($num / $total) * 100);
        return $par;
    }

    // AWS取得
    public function awsGet(){
        $region = "ap-northeast-1";
        $region_set = putenv('AWS_DEFAULT_REGION=' . $region);
        //計測開始時間
        $start_time = date('Y-m-d',strtotime("-33 hour")).'T'.date('H:i:s',strtotime("-33 hour"));
        //計測終了時間
        $end_time = date('Y-m-d',strtotime("-9 hour")).'T'.date('H:i:s',strtotime("-9 hour"));
        //計測間隔 例)600 = 10分
        $period = '1800';
        //ローカルでも動きます。
        if (app()->isLocal()) {
        $cmd = '"C:\Program Files\Amazon\AWSCLI\aws.exe" cloudwatch get-metric-statistics --metric-name CPUUtilization --start-time '.$start_time.' --end-time '.$end_time.' --period '.$period.' --namespace AWS/EC2 --statistics Average --dimensions Name=InstanceId,Value=i-0b73d4b0c1fea8a15 --query "sort_by(Datapoints,&Timestamp)[*]" 2>&1';
        exec($cmd, $val_array, $var);
        mb_convert_variables('UTF-8','SJIS-win',$val);
        } else {
        $cmd = '/usr/bin/aws cloudwatch get-metric-statistics --metric-name CPUUtilization --start-time '.$start_time.' --end-time '.$end_time.' --period '.$period.' --namespace AWS/EC2 --statistics Average --dimensions Name=InstanceId,Value=i-0b73d4b0c1fea8a15 --query "sort_by(Datapoints,&Timestamp)[*]" 2>&1';
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

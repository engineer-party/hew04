<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AwsTestController extends Controller
{
  public function index()
  {
    $region = "ap-northeast-1";
    $region_set = putenv('AWS_DEFAULT_REGION=' . $region);

    //計測開始時間
    $start_time = '2020-03-01T00:00:00';
    //計測終了時間
    $end_time = '2020-03-01T03:00:00';
    //計測間隔 例)600 = 10分
    $period = '600';
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

    //結果発表～(cv浜田雅功)
    dd($val_new);
  }
}

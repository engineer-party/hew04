<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AwsTestController extends Controller
{
  public function index()
  {
    $cmd = 'aws cloudwatch get-metric-statistics --metric-name CPUUtilization --start-time 2020-02-19T00:00:00Z --end-time 2020-02-20T00:00:00Z --period 600 --namespace AWS/EC2 --statistics Average --dimensions Name=InstanceId,Value=i-0b73d4b0c1fea8a15 --query "sort_by(Datapoints,&Timestamp)[*]"';
    exec("which aws",$val,$result);
    dd($val);
  }
}

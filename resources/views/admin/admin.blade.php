@extends('layout.admin')

<!-- head -->
@section('title', 'Admin')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css',$is_production)}}" /> -->

@endsection
@include('common.admin_head')
<!-- header -->
@include('common.admin_header')

<!-- content -->
@section('content')
<div class="row">
  <div class="col-lg-9 main-chart">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel" style=" margin-top: -45px;">
        <h4><i class="fa fa-angle-right"></i> サーバー稼働チャート 
          <span style="font-size:0.9em;">({{ date('m月d日H時i分',strtotime("-6 hour")). '~' . date('m月d日H時i分',strtotime("-10 minute")) }})</span>
        </h4>
          <div class="panel-body text-center" id="canvasBox">
            <canvas id="line" height="300" width="700" style=" text-align: center;"></canvas>
          </div>
        </div>
      </div>
    </div>
    <script>
      var lineChartData = {
        labels : [
          @foreach ($vals as $val)
            "{{ date('G:i',strtotime($val['Timestamp'])) }}",
          @endforeach
        ],
        datasets : [
          {
              fillColor : "rgba(151,187,205,0.5)",
              strokeColor : "rgba(151,187,205,1)",
              pointColor : "rgba(151,187,205,1)",
              pointStrokeColor : "#fff",
              data : [
                @foreach ($vals as $val)
                  {{ round($val['Average'], 3) }},
                @endforeach
              ]
          }
        ]

      };

      new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);

    </script>
    <!--custom chart end-->
    <div class="row mt">
      <!-- SERVER STATUS PANELS -->
      <div class="col-md-4 col-sm-4 mb">
        <div class="grey-panel pn donut-chart">
          <div class="grey-header">
            <h5>ポイントサービス率</h5>
          </div>
          <canvas id="serverstatus01" height="120" width="120"></canvas>
          <script>
            var doughnutData = [{
                value: {{ $buyPointGraph['totalBuyPoint'] }},
                color: "#FF6B6B"
              },
              {
                value: {{ $buyPointGraph['totalBuyPoint'] - $buyPointGraph['totalBuyPointPrice'] }},
                color: "#fdfdfd"
              }
            ];
            var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
          </script>
          <div class="row">
            <div class="col-sm-6 col-xs-6 goleft">
              <p>サービス率:</p>
            </div>
            <div class="col-sm-6 col-xs-6">
              <h2>{{ $buyPointGraph['buyPointPar'] }}%</h2>
            </div>
          </div>
        </div>
        <!-- /grey-panel -->
      </div>
      <!-- /col-md-4-->
      <div class="col-md-4 col-sm-4 mb">
        <div class="darkblue-panel pn">
          <div class="darkblue-header">
            <h5>購入時支払方法割合</h5>
          </div>
          <canvas id="serverstatus02" height="120" width="120"></canvas>
          <script>
            var doughnutData = [{
                value: {{ $pointOrCash['parCash'] }},
                color: "#1c9ca7"
              },
              {
                value: {{ $pointOrCash['parPoint'] }},
                color: "#f68275"
              }
            ];
            var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
          </script>
          <p>総支払額 ¥{{ number_format($pointOrCash['totalPay']) }}</p>
          <footer>
            <div class="pull-left">
              <h5 style="color:#f68275">{{ $pointOrCash['parPoint'] }}<span style="font-size:0.6em;">%</span> Point</h5>
            </div>
            <div class="pull-right">
              <h5 style="color:#1c9ca7">{{ $pointOrCash['parCash'] }}<span style="font-size:0.6em;">%</span> Cash</h5>
            </div>
          </footer>
        </div>
        <!--  /darkblue panel -->
      </div>
      <!-- /col-md-4 -->
      <div class="col-md-4 col-sm-4 mb">
        <!-- REVENUE PANEL -->
        <div class="green-panel pn">
          <div class="green-header">
            <h5>{{ date('m月d日',strtotime("-7 day")) .'~'. date('m月d日')}}の売上額</h5>
          </div>
          <div class="chart mt">
            <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4"
              data-data="[
                @foreach ($days as $day)
                  {{ $day }}
                  @if (!$loop->last)
                    ,
                  @endif
                @endforeach 
              ]">
            </div>
          </div>
          <p class="mt"><b>¥ {{ number_format(array_sum($days)) }}</b><br/>1週間の売上総額</p>
        </div>
      </div>
      <!-- /col-md-4 -->
    </div>
    <!-- /row -->

    
  </div>
  <!-- /col-lg-9 END SECTION MIDDLE -->
  <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->
  <div class="col-lg-3 ds">
    <!-- CALENDAR-->
    <div id="calendar" class="mb">
      <div class="panel green-panel no-margin">
        <div class="panel-body">
          <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
            <div class="arrow"></div>
            <h3 class="popover-title" style="disadding: none;"></h3>
            <div id="date-popover-content" class="popover-content"></div>
          </div>
          <div id="my-calendar"></div>
        </div>
      </div>
    </div>
    <!-- / calendar -->
  </div>
  <!-- /col-lg-3 -->
</div>
<!-- /row -->

@endsection

<!-- footer -->
@include('common.admin_footer')
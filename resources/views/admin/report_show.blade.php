@extends('layout.admin')

<!-- head -->
@section('title', 'ReportShow')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css',$is_production)}}" /> -->

@endsection
@include('common.admin_head')
<!-- header -->
@include('common.admin_header')

<!-- content -->
@section('content')
<h3><i class="fa fa-angle-right"></i> 通報内容</h3>
<div class="row mt">
  <div class="col-md-12">
    <div class="content-panel">
      <table class="table table-striped table-advance table-hover">
        <h4><i class="fa fa-angle-right"></i> {{ $title['name'] }} <i class="fa fa-angle-right"></i> {{ $title['title'] }}一覧</h4>
        <hr>
        <thead>
          <tr>
            <th>
              @if (!($title['title'] == '投稿した通報'))
                投稿ユーザーID
              @else
                通報ユーザーID
              @endif
            </th>
            <th>カテゴリー</th>
            <th>詳細</th>
            <th>投稿日</th>
          </tr>
        </thead>
        <tbody>
        @foreach($reports as $report)
          <tr>
            <td>
              @if (!($title['title'] == '投稿した通報'))
                {{ $report->sender_id }}  
              @else
                {{ $report->target_id }}
              @endif
            </td>
            <td>{{ $categories[$report->category_id-1]  }}</td>
            <td>{{ $report->detail  }}</a></td>
            <td>{{ $report->created_at  }}</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /content-panel -->
  </div>
  <!-- /col-md-12 -->
</div>
<!-- /row -->
@endsection

<!-- footer -->
@include('common.admin_footer')
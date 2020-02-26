@extends('layout.admin')

<!-- head -->
@section('title', 'Report')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}" /> -->

@endsection
@include('common.admin_head')
<!-- header -->
@include('common.admin_header')

<!-- content -->
@section('content')
<h3><i class="fa fa-angle-right"></i> 通報管理</h3>
@if(session('message'))
  <div class="alert alert-success mt-4" role="alert"><strong>{{ session('message') }}</strong></div>
@endif
<div class="row mt">
  <div class="col-md-12">
    <div class="content-panel">
      <table class="table table-striped table-advance table-hover">
        <h4><i class="fa fa-angle-right"></i> 通報情報一覧 <span style="font-size:0.7em; font-style: italic">　　数字をクリックで詳細表示</span></h4>
        <hr>
        <thead>
          <tr>
            <th>ID</th>
            <th>名前</th>
            <th>画像</th>
            <th>名前</th>
            <th>データ</th>
            <th>位置情報</th>
            <th>その他</th>
            <th>全て</th>
            <th>投稿</th>
            <th>アカウント停止</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td><a href="/admin/report/show/{{ $user->id }}/1">{{ $user->targetReports->where('category_id','=',1)->count()  }}</a></td>
            <td><a href="/admin/report/show/{{ $user->id }}/2">{{ $user->targetReports->where('category_id','=',2)->count()  }}</a></td>
            <td><a href="/admin/report/show/{{ $user->id }}/3">{{ $user->targetReports->where('category_id','=',3)->count()  }}</a></td>
            <td><a href="/admin/report/show/{{ $user->id }}/4">{{ $user->targetReports->where('category_id','=',4)->count()  }}</a></td>
            <td><a href="/admin/report/show/{{ $user->id }}/5">{{ $user->targetReports->where('category_id','=',5)->count()  }}</a></td>
            <td><a href="/admin/report/show/{{ $user->id }}/6">{{ $user->targetReports->count()  }}</a></td>
            <td><a href="/admin/report/show/{{ $user->id }}/7">{{ $user->sendReports->count()  }}</a></td>
            <td>
              <a href="/admin/report/delete/{{ $user->id }}"><button class="btn btn-danger btn-xs"><i class="fa fa-lock" aria-hidden="true"></i></button></a>
            </td>
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
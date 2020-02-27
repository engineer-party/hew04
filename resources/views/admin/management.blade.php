@extends('layout.admin')

<!-- head -->
@section('title', 'management')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}" /> -->

@endsection
@include('common.admin_head')
<!-- header -->
@include('common.admin_header')

<!-- content -->
@section('content')
<h3><i class="fa fa-angle-right"></i> ユーザー一覧</h3>
<div class="col-md-12">
    <div class="content-panel">
      <table class="table table-striped table-advance table-hover">
        <h4><i class="fa fa-angle-right"></i> ユーザー情報一覧</h4>
        <hr>
        <thead>
          <tr>
            <th>ID</th>
            <th>名前</th>
            <th>ポイント残高</th>
            <th>収益</th>
            <th>作成日</th>
            <th>通報受信</th>
            <th>通報投稿</th>
            <th>お知らせ</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ number_format($user->point) }} HC</td>
            <td>¥{{ number_format($user->musics->sum('price') + $user->buyPoints()->sum('price')) }}</td>
            <td>{{ $user->created_at  }}</td>
            <td><a href="/admin/report/show/{{ $user->id }}/6">{{ $user->targetReports->count()  }}</a></td>
            <td><a href="/admin/report/show/{{ $user->id }}/7">{{ $user->sendReports->count()  }}</a></td>
            <td>
            <a href="/admin/information/send/{{ $user->id }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
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
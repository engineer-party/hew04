@extends('layout.admin')

<!-- head -->
@section('title', 'suspension')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}" /> -->

@endsection
@include('common.admin_head')
<!-- header -->
@include('common.admin_header')

<!-- content -->
@section('content')
<h3><i class="fa fa-angle-right"></i> Suspensions</h3>
<div class="row mt">
  <div class="col-md-12">
    <div class="content-panel">
      <table class="table table-striped table-advance table-hover">
        <h4><i class="fa fa-angle-right"></i> Suspended Account</h4>
        <hr>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Point</th>
            <th>Profit</th>
            <th>ReceiveReport</th>
            <th>SendReport</th>
            <th>Suspension Date</th>
            <th>Release</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->point }} HC</td>
            <td>¥{{ $user->musics->sum('price') + $user->buyPoints()->sum('price') }}</td>
            <td><a href="/admin/report/{{ $user->id }}/6"> {{ $user->targetReports->count()  }}</a></td>
            <td><a href="/admin/report/{{ $user->id }}/7">{{ $user->sendReports->count()  }}</a></td>
            <td>{{ $user->deleted_at  }}</td>
            <td>
              <button class="btn btn-success btn-xs"><i class="fa fa-unlock-alt" aria-hidden="true"></i></button>
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
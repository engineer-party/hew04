@extends('layout.admin')

<!-- head -->
@section('title', 'sales')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}" /> -->

@endsection
@include('common.admin_head')
<!-- header -->
@include('common.admin_header')

<!-- content -->
@section('content')
<h3><i class="fa fa-angle-right"></i> Users</h3>
<div class="col-md-12">
    <div class="content-panel">
      <table class="table table-striped table-advance table-hover">
        <h4><i class="fa fa-angle-right"></i> Users Table</h4>
        <hr>
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Point</th>
            <th>Profit</th>
            <th>ReceiveReport</th>
            <th>SendSendReport</th>
            <th>Information</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->point }}HC</td>
            <td>¥{{ $user->musics->sum('price') + $user->buyPoints()->sum('price') }}</td>
            <td>{{ $user->targetReports->count()  }}</td>
            <td>{{ $user->sendReports->count()  }}</td>
            <td>
              <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
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
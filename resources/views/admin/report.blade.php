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
<h3><i class="fa fa-angle-right"></i> Report</h3>
<div class="row mt">
  <div class="col-md-12">
    <div class="content-panel">
      <table class="table table-striped table-advance table-hover">
        <h4><i class="fa fa-angle-right"></i> Reports Table <span style="font-size:0.7em; font-style: italic">　　Click for details page</span></h4>
        <hr>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>#1 Image</th>
            <th>#2 Name</th>
            <th>#3 Data</th>
            <th>#4 Location</th>
            <th>#5 OtherOther</th>
            <th>Total</th>
            <th>Send</th>
            <th>Suspension</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td><a href="">{{ $user->targetReports->where('category_id','=',1)->count()  }}</a></td>
            <td><a href="">{{ $user->targetReports->where('category_id','=',2)->count()  }}</a></td>
            <td><a href="">{{ $user->targetReports->where('category_id','=',3)->count()  }}</a></td>
            <td><a href="">{{ $user->targetReports->where('category_id','=',4)->count()  }}</a></td>
            <td><a href="">{{ $user->targetReports->where('category_id','=',5)->count()  }}</a></td>
            <td><a href="">{{ $user->targetReports->count()  }}</a></td>
            <td><a href="">{{ $user->sendReports->count()  }}</a></td>
            <td>
              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
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
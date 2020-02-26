@extends('layout.admin')

<!-- head -->
@section('title', 'Price')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}" /> -->

@endsection
@include('common.admin_head')
<!-- header -->
@include('common.admin_header')

<!-- content -->
@section('content')
<h3><i class="fa fa-angle-right"></i> Discount Form</h3>
<!-- BASIC FORM VALIDATION -->
<div class="row mt">
  <div class="col-lg-12">
    <h4><i class="fa fa-angle-right"></i> Artist</h4>
    <div class="form-panel">
      <form role="form" class="form-horizontal style-form">
        <div class="form-group has-success">
          <label class="col-lg-2 control-label">Artist Name</label>
          <div class="col-lg-10">
            <input type="text" placeholder="" id="f-name" class="form-control">
            <p class="help-block">Successfully done</p>
          </div>
        </div>
        <div class="form-group has-error">
          <label class="col-lg-2 control-label">Discount Price</label>
          <div class="col-lg-10">
            <input type="text" placeholder="" id="l-name" class="form-control">
            <p class="help-block">Aha you gave a wrong info</p>
          </div>
        </div>
        <div class="form-group has-warning">
          <label class="col-lg-2 control-label">Email</label>
          <div class="col-lg-10">
            <input type="email" placeholder="" id="email2" class="form-control">
            <p class="help-block">Something went wrong</p>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button class="btn btn-theme" type="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /form-panel -->
  </div>
  <!-- /col-lg-12 -->
</div>
<!-- /row -->
@endsection

<!-- footer -->
@include('common.admin_footer')
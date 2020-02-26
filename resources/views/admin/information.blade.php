@extends('layout.admin')

<!-- head -->
@section('title', 'Information')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}" /> -->

@endsection
@include('common.admin_head')
<!-- header -->
@include('common.admin_header')

<!-- content -->
@section('content')
<h3><i class="fa fa-angle-right"></i> お知らせ</h3>
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
  <div class="col-lg-6 col-md-6 col-sm-6">
    <h4 class="title">新規お知らせ作成</h4>
    <div id="message"></div>
    <form class="contact-form php-mail-form" role="form" action="contactform/contactform.php" method="POST">

      <div class="form-group">
        <input type="name" name="title" class="form-control" id="information-title" placeholder="Information Title" >
        <div class="validate"></div>
      </div>
      <div class="form-group">
        <select name="category" class="form-control" id="information-to">
          <option value="">ALL</option>
        </select>
        <div class="validate"></div>
      </div>
      <div class="form-group">
        <textarea class="form-control" name="contetn" id="contact-message" placeholder="Information Content" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
        <div class="validate"></div>
      </div>
      
      <div class="loading"></div>
      <div class="error-message"></div>
      <div class="sent-message">Your message has been sent. Thank you!</div>

      <div class="form-send">
        <button type="submit" class="btn btn-large btn-primary">Send Message</button>
      </div>

    </form>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6">
    <h4 class="title">Information Log</h4>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"s standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    <ul class="contact_details">
      <li><i class="fa fa-envelope-o"></i> info@yoursite.com</li>
      <li><i class="fa fa-phone-square"></i> +34 5565 6555</li>
      <li><i class="fa fa-home"></i> Some Fine Address, 887, Madrid, Spain.</li>
    </ul>
    <!-- contact_details -->
  </div>
</div>
<!-- /row -->
@endsection

<!-- footer -->
@include('common.admin_footer')
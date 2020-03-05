@extends('layout.admin')

<!-- head -->
@section('title', 'Information')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css',$is_production)}}" /> -->

@endsection
@include('common.admin_head')
<!-- header -->
@include('common.admin_header')

<!-- content -->
@section('content')
<!-- BASIC FORM ELELEMNTS -->
<h3><i class="fa fa-angle-right"></i> お知らせ</h3>
@if(session('message'))
  <div class="alert alert-success mt-4" role="alert"><strong>{{ session('message') }}</strong></div>
@endif
<div class="row mt">
  <div class="col-lg-6 col-md-6 col-sm-6">
    <h4 class="title">新規お知らせ作成</h4>
    <div id="message"></div>
    <form class="contact-form php-mail-form" role="form" action="information/store" method="POST">
      <div class="form-group">
        <input type="name" name="title" class="form-control" id="title" value="{{ old('title') }}"  placeholder="お知らせタイトル" >
        @if($errors)
        <p class="help-block">{{$errors->first('title')}}</p>
        @endif
      </div>
      <div class="form-group">
        <input type="name" name="to" class="form-control" id="to" value="{{ session('user_id') ? session('user_id') :old ('title') }}" placeholder="宛先コード" >
        @if($errors)
        <p class="help-block">{{$errors->first('to')}}</p>
        @endif
      </div>
      <div class="form-group">
        <textarea class="form-control" name="content" id="content" placeholder="お知らせ内容" rows="5">{{ old('content') }}</textarea>
        @if($errors)
        <p class="help-block">{{$errors->first('content')}}</p>
        @endif
      </div>

      <div class="form-send">
        <button type="submit" class="btn btn-large btn-primary">送信する</button>
      </div>

    </form>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="content-panel">
      <h4>宛先コード</h4>
      <section id="unseen">
        <table class="table table-bordered table-striped table-condensed">
          <thead>
            <tr>
              <th>コード</th>
              <th>宛先</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>all</td>
              <td>全ユーザー</td>
            </tr>
            <tr>
              <td>(対象ユーザーのID)</td>
              <td>対象ユーザー</td>
            </tr>
            <tr>
              <td>profit-(金額)</td>
              <td>(金額)以上の決済利用済みのユーザー</td>
            </tr>
            <tr>
              <td>music-(数字)</td>
              <td>(数字)以上の楽曲を購入済みのユーザー</td>
            </tr>
          </tbody>
        </table>
      </section>
    </div>
    <!-- /content-panel -->
  </div>
  <!-- /col-lg-4 -->
</div>
<!-- /row -->
@endsection

<!-- footer -->
@include('common.admin_footer')
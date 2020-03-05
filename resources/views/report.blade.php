@extends('layout.layout')

<!-- head -->
@section('title', 'Report')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/report.css',$is_production)}}" />

<script src="{{ asset('js/hbg.js',$is_production) }}" defer></script>

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="contents">
<!--<h1 id="title">通報フォーム</h1>-->
<form action="/report/store" method="POST" id="report-form" class="report-form">
    {{ csrf_field() }}

    <h2>ID: {{ $user->name }} さん<h2>
<!--    <p><input type="tel" name="id" value="{{ old('id') }}" class="form-control user-id" placeholder="通報するユーザーのID"></p>-->
    @if($errors)
        <p id="error">{{$errors->first('category')}}</p>
    @endif
    @if(session('message'))
      <div class="success"><strong>{{ session('message') }}</strong></div>
    @endif
    <h3></h3>
    <ul class="report-category mt-4">
      <li><label class="report-btn">
        <input type="radio" name="category" value="1"><span class="title">画像</span><br>
        <span class="detail">不適切な画像</span></label></li>
      <li><label class="report-btn">
        <input type="radio" name="category" value="2"><span class="title">名前</span><br>
        <span class="detail">不適切な名前</span></label></li>
      <li><label class="report-btn">
        <input type="radio" name="category" value="3"><span class="title">データ</span><br>
        <span class="detail">データを改ざん</span></label></li>
      <li><label class="report-btn">
        <input type="radio" name="category" value="4"><span class="title">GPS</span><br>
        <span class="detail">位置情報を改ざん</span></label></li>
      <li><label class="report-btn">
        <input type="radio" name="category" value="5"><span class="title">その他</span><br>
        <span class="detail">その他の迷惑行為</span></label></li>
    </ul>

    <p><textarea name="detail" rows="6" placeholder="詳細な説明（任意）例）位置情報を不正取得している。" class="text-area">{{ old('detail') }}</textarea></p>
    <input type="hidden" name="id" value="{{ $user_id }}">
    <a href=""><button type="submit" class="btn report-action">通報する</button></a>
</form>
</div>
<script>
  let headOpen = false;
  
  $(function(){
    $('label').each(function(index){
      let e = index;
      $(this).hammer().on('tap',function(){
        $('.title').removeClass('active');
        $('.report-btn').removeClass('active-label');
        $('.title').eq(e).addClass('active');
        $('.report-btn').eq(e).addClass('active-label');
      });
    });
  });
</script>
@endsection

<!-- footer -->
@include('common.footer')

<style type="text/css">
  #link-list li:nth-child(4) {
/*    background: rgba(0, 0, 0, 0.1);*/
  }

  #link-list li:nth-child(4) .link-title {
/*    color: #ff5757;*/
  }

  #link-list li:nth-child(1)::before {
    background-image: url({{ asset('img/home.png',$is_production)}});
  }
  
  #link-list li:nth-child(2)::before {
    background-image: url({{ asset('img/hunt.png',$is_production)}});
  }
  
  #link-list li:nth-child(3)::before {
    background-image: url({{ asset('img/streaming.png',$is_production)}});
  }
  
  #link-list li:nth-child(4)::before {
    background-image: url({{ asset('img/playlist.png',$is_production)}});
  }
  
  #app .search{
    display: none;
  }
  
  * {
    margin: 0;
    padding: 0;
  }

  #wrapper {
    width: 100%;
    height: 100vh;
    background-color: #FFEBE0;
    position: fixed;
    top: 0;
    left: 0;
    overflow-y: scroll;
  }

  #app #form {
    display: none;
  }

  #app {
    width: 100%;
    background-color: #ff5757;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 50;
  }

  #app .menu-trigger {
    top: 22px;
    left: 30px;
  }

  #app h1 {
    padding: 20px;
    padding-left: 65px;
    padding-bottom: 20px;
    color: white;
    font-size: 1.2em;
    letter-spacing: 2px;
  }
  #contents {
    width: 100%;
    height: 100vh;
    display: flex;
    top: 0;
    left: 0;
    overflow-y: scroll;
    padding-top: 80px;
  }
  .user-id {
    display: none;
  }
  .report-form h2{
    width: 100vw;
    height: 30px;
    line-height: 50px;
    text-align: center;
/*    background-color: aqua;*/
    font-size: 1.1em;
    color: red;
  }
  .report-category input{
    display: none;
  }
  .report-category {
    margin: 0 auto;
/*    background-color: white;*/
    width: 90%;
    height: auto;
    display: grid;
    grid-gap: 5px 6px;
    grid-template-columns: calc(100% / 3 - 4px) calc(100% / 3 - 4px) calc(100% / 3 - 4px);
  }

  .report-btn{
    border-radius: 4px;
    text-align: center;
    width: 100%;
    height: 100px;
    overflow: hidden;
    border: solid black 1px;
    background: white;
    transition: all 0.3s cubic-bezier(0, 0, 0.2, 1) 0s;
  }
  
  .report-category span{
/*    width: 100%;*/
    margin: 0 auto;
  }
  .report-category .title{
/*    display: none;*/
    line-height: 100px;
    transition: all 0.3s cubic-bezier(0, 0, 0.2, 1) 0s;

  }
  .report-category .detail{
    font-size: 0.7em;
    line-height: 70px;
  }
  .text-area {
    width: 90%;
/*    margin: 0 auto;*/
    position: relative;
    top: 50px;
    left: 50%;
    transform: translate(-50%);
    margin-bottom: 100px;
    padding: 5px;
  }
  .report-action {
    width: 90%;
    position: relative;
    left: 50%;
    transform: translate(-50%);
    height: 50px;
    line-height: 50px;
    background-color: #ff5757;
    color: white;
  }
  .active{
    display: none;
  }
  .active-label{
    background-color: #404040;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.4);
    color: #ff5757;
  }
  
</style>

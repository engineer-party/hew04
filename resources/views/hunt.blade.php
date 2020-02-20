@extends('layout.layout')

<!-- head -->
@section('title', 'Hunt')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />

<script src="{{ asset('js/hunt.js') }}" defer></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>
@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="contents">
  <h2>ハント可能な楽曲</h2>
  
  <!-- 曲 -->
  <div class="content">
    <p class="account"><span>・・・</span><span>アカウント名</span>さんが公開中<span>・・・</span></p>
    <div class="music">
      <div class="icon">
        <span></span>
        <span></span>
      </div>
      <p><img src="{{ asset('img/Hunc Logo.png') }}" alt=""></p>
      <ul>
        <li class="title">title</li>
        <li class="artist">artist</li>
      </ul>
    </div>
  </div>
  <!-- END -->
</div>
@endsection

<!-- footer -->
@include('common.footer')

<style type="text/css">
#app .form {
display: none;
}
#app {
width: 100%;
height: 9%;
background-color: #ff5757;
}
#app .menu-trigger{
top: 25px;
}
#app h1{
position: absolute;
top: 22px;
left: 70px;
color: white;
font-size: 1.2em;
letter-spacing: 4px;
}
  #contents {
    width: 90%;
    height: auto;
    margin: 0 auto;
  }
  #contents h2{
    color: #ff5757;
    width: 100%;
    font-size: 1.0em;
    text-align: center;
    line-height: 80px;
  }
  .content .music{
    display: flex;
    width: 100%;
    box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
  }
  .content .icon {
    position: relative;
    top: 21px;
    left: 15px;
    width: 20px;
    height: 8px;
    display: block;
  }
  .content .icon span{
    position: absolute;
    width: 20px;
    height: 2px;
    background-color: gray;
    border-radius: 2px;
  }
  .content .icon span:nth-of-type(1) {
    top: 0px;
  }
  .content .icon span:nth-of-type(2) {
    bottom: 0px;
  }
  .content .account{
    width: 100%;
    font-size: 0.8em;
    color: gray;
    text-align: center;
    line-height: 50px;
  }
  .content .account span{
    margin-left: 10px;
    margin-right: 10px;
    letter-spacing: 5px;
  }
  .content img{
    width: 50px;
    height: 50px;
/*    border: solid black 1px;*/
    margin-left: 25px;
  }
  .content ul{
    margin-left: 10px;
    height: 50px;
  }
  .content .title{
    font-size: 1.1em;
    line-height: 30px;
/*    background-color: aqua;*/
  }
  .content .artist{
    font-size: 0.8em;
    color: gray;
/*    line-height: 20px;*/
/*    background-color: aquamarine;*/
  }
</style>
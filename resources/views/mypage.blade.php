@extends('layout.layout')

<!-- head -->
@section('title', 'Mypage')
@section('style')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}" />
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />

<script src="{{ asset('js/mypage.js') }}" defer></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>


@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')

<div class="contents">
  <div class="img">
    <h2></h2>
  </div>
  <div class="text">
    <ul>
      <li><span class="value">{{ $user->name }}</span><br><span class="text-in">表示名</span></li>
      <li><span class="value">bule.impulse@gmail.com</span><br><span class="text-in">メール</span></li>
      <li><span class="value">4545seiyaletsgo</span><br><span class="text-in">パスワード</span></li>
      <li><span class="value">2pt</span><br><span class="text-in">ポイント</span></li>
    </ul>
  </div>
</div>
<div class="form">
  <div class="head">
    <div class="back">
      <div class="topLine line"></div>
      <div class="borderLine line"></div>
      <div class="bottomLine line"></div>
    </div>
    <h2>プロフィールを編集</h2>
    <button>保存</button>
  </div>
  <div class="profile">
  <label for="img-form">
    <img alt="" class="account-img">
    <input type="file" id="img-form">
  </label>
  <ul>
    <li><span class="title">表示名</span><br><input type="text" value="春太郎"></li>
    <li><span class="title">メール</span><br><input type="text" value="bule.impulse1201@gmail.com"></li>
    <li><span class="title">パスワード</span><br><input type="text" value="1919seiyaletsgo"></li>
  </ul>
  </div>
</div>


@endsection

<!-- footer -->
@include('common.footer')

<script>
  
</script>


<style>
  
  .img {
    background-image: url({{ asset('img/joan-jett.jpg') }});
  }
  .img::before{
    content: '{{ $user->name }}';
  }
  
* {
    margin: 0;
    padding: 0;
  }

  #wrapper {
    width: 100%;
    height: 100vh;
    background-color: #fbd160;
    position: fixed;
    top: 0;
    left: 0;
  }

  #app .form {
    display: none;
  }

  #app {
    width: 100%;
/*    background-color: #ff5757;*/
    position: relative;
    top: 0;
    left: 0;
    z-index: 100;
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
    letter-spacing: 4px;
  }
</style>
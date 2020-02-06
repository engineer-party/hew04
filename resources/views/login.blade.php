@extends('layout.user')

<!-- head -->
@section('title', 'Login')
@section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="{{asset('css/bootstrap-social-gh-pages/bootstrap-social.css')}}" />
<link rel="stylesheet" href="{{asset('css/flame.css')}}" />
<link rel="stylesheet" href="{{asset('css/login.css')}}" />
<link rel="stylesheet" href="{{asset('css/login_header.css')}}" />
@endsection
@include('common.head')

<div id="wrapper">
<!-- header -->
@include('common.user.header')

<!-- content -->
@section('content')
<div id="content">


<form id="login" action="{{ url('/login')}}" method="post">
    {{ csrf_field() }}
    @if(session('message'))
        <p>{{ session('message') }}ok</p>
    @endif
    <div class="form-group">
       <p>メールアドレス</p>
        <input type="text" id="mail" class="form-control" placeholder="メールアドレス" name="email">
    </div>
    <div class="form-group">
        <p>パスワード<a href="#">パスワードをお忘れの方</a></p>
        <input type="password" id="pass" class="form-control" placeholder="パスワード" name="password">
    </div>
    <p id="login-btn"><button type="submit" class="btn btn-danger">ログイン</button></p>
</form>

<div id="applogin">
  <h2>お持ちのアカウントでログイン</h2>
  <ul>
    <li><a href="/login/google"><span class="comment">google</span><img src="{{ asset('img/google.png') }}" alt="google"></a></li>
    <li><a href="/login/twitter"><span class="comment">twitter</span><img src="{{ asset('img/twitter.png') }}" alt="twitter"></a></li>
  </ul>
</div>

<div id="signup">
   <ul>
     <li><a href="signup">会員ではありませんか？</a></li>
     <li><a href="signup" id="signup-btn"><button type="button" class="btn btn-primary">新規会員登録</button></a></li>
   </ul>
</div>
    

</div>
@endsection

<!-- footer -->
@include('common.user.footer')
</div>

<style type="text/css">
  
  footer {
    position: absolute;
    bottom: 0;
    left: 0;
  }
  #content {
    height: 100vh;
    width: 90%;
    margin: 0 auto;
  }
  #content form {
    width: 100%;
/*    margin-top: 200px;*/
    padding-top: 45%;
  }
  #content form #login-btn{
    text-align: center;
  }
  #content form button{
    margin-top: 20px;
    width: 100%;
    line-height: 30px;
  }
  .form-group a{
    margin-left: 20px;
  }
  .form-group p{
    line-height: 40px;
  }
  #signup {
    width: 100%;
    height: auto;
    margin-top: 30px;
/*    background-color: aqua;*/
  }
  #signup ul{
    display: flex;
    justify-content: space-around;
  }
  #signup li{
    line-height: 60px;
  }
  #applogin {
    line-height: 100px;
    margin-top: 40px;
  }
  #applogin h2{
    padding: 10px;
    
  }
  #applogin ul{
    width: 100%;
    display: flex;
    justify-content: space-around;
    padding: 15px;
    border-top: solid gray 1px;
    border-bottom: solid gray 1px;
  }
  #applogin li{
    height: 80px;
    width: 100px;
/*    background-color: aqua;*/
  }
  #applogin ul li img{
    position: relative;
    top: 0;
    left: 50%;
    transform: translate(-50%);
    height: 50px;
  }
  #applogin .comment{
    margin-left: -50%;
    position: relative;
    top: 20px;
    left: 75%;
  }
</style>

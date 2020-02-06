@extends('layout.user')

<!-- head -->
@section('title', 'Login')
@section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="{{asset('css/bootstrap-social-gh-pages/bootstrap-social.css')}}" />
<link rel="stylesheet" href="{{asset('css/flame.css')}}" />
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
    <a href="/login/google"><button type="button" class="btn btn-danger"><span class="fa fa-google"></span>Googleでログイン</button></a>
    <a href="/login/twitter"><button type="button" class="btn btn-info"><span class="fa fa-twitter"></span>Twitterでログイン</button></a>
    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif
    <div class="form-group">
       <p>メールアドレス</p>
        <input type="text" id="mail" class="form-control" placeholder="メールアドレス" name="email">
    </div>
    <div class="form-group">
        <p>パスワード<a href="#">パスワードをお忘れの方</a></p>
        <input type="password" id="pass" class="form-control" placeholder="パスワード(8文字以上)" name="password">
    </div>
    <p id="login-btn"><button type="submit" class="btn btn-danger">ログイン</button></p>
</form>

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
    height: 100%;
    width: 90%;
    margin: 0 auto;
  }
  #content form {
    width: 100%;
    padding-top: 60%;
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
    margin-top: 15%;
  }
  #signup ul{
    display: flex;
    justify-content: space-around;
  }
  #signup li{
    line-height: 60px;
  }
</style>

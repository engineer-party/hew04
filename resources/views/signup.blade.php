@extends('layout.user')

<!-- head -->
@section('title', 'Signup')
@section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="{{asset('css/bootstrap-social-gh-pages/bootstrap-social.css')}}" />
<link rel="stylesheet" href="{{asset('css/flame.css')}}" />
<link rel="stylesheet" href="{{asset('css/signup.css')}}" />
<link rel="stylesheet" href="{{asset('css/login_header.css')}}" />
@endsection
@include('common.head')

<div id="wrapper">
<!-- header -->
@include('common.user.header')

<!-- content -->
@section('content')
<div id="content">
<h1 id="title">新規会員登録</h1>
<h2>方法をお選びください</h2>
<div id="signup">
   <ul>
     <li><a href="signup/form"><img src="{{ asset('img/svg-icon/mail.svg') }}" alt="mail"><span>mail</span></a></li>
     <li><a href="login/google"><img src="{{ asset('img/google.png') }}" alt="google"><span>google</span></a></li>
     <li><a href="login/twitter"><img src="{{ asset('img/twitter.png') }}" alt="twitter"><span>twitter</span></a></li>
   </ul>
</div>
</div>
@endsection

<!-- footer -->
@include('common.user.footer')
</div>

<style type="text/css">
  #content h1{
    padding-top: 45%;
    color: gray;
    font-size: 1.0em;
    text-align: center;
    margin-bottom: 40px;
  }
  #content h2{
    padding: 20px;
    text-align: center;
    color: #ff5757;
    color: black;
  }
  #signup {
    width: 100%;
/*    margin-top: 0px;*/
  }
  #signup ul{
    width: 100%;
    display: flex;
    justify-content: space-around
  }
  #signup li{
/*    border-bottom: solid black 1px;*/
    height: 80px;
    margin: 0 auto;
    width: 100px;
    text-align: center;
/*    border: solid black 1px;*/

  }
  #signup img {
    margin-top: 15px;
    height: 50px;
    text-align: center;
    overflow: hidden;
    float: left;
    margin-left: 25px;
  }
  #signup span{
    overflow: hidden;
    position: relative;
    top: 10px;
    left: ;
  }
  #signup span:nth-child(1){
    
  }
</style>
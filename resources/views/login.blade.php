@extends('layout.user')

<!-- head -->
@section('title', 'Login')
@section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="{{asset('css/bootstrap-social-gh-pages/bootstrap-social.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/flame.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/login_header.css',$is_production)}}" />
@endsection
@include('common.head')

<div id="wrapper">
<!-- header -->
@include('common.user.header')

<!-- content -->
@section('content')
<div id="content">


<form id="login" action="{{ url('/login',null,$is_production)}}" method="post">
    {{ csrf_field() }}
    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif
    <div class="form-group">
       <p>メールアドレス</p>
        <input type="text" id="mail" class="form-control" placeholder="メールアドレス" value="{{ old('email') }}" name="email">
        <span class="form-text text-danger">{{$errors->first('email')}}</span>
    </div>
    <div class="form-group">
        <p>パスワード<a href="#">パスワードをお忘れの方</a></p>
        <input type="password" id="pass" class="form-control" placeholder="パスワード(8文字以上)" value="" name="password">
        <span class="form-text text-danger">{{$errors->first('password')}}</span>
    </div>
    <p id="login-btn"><button type="submit" class="btn btn-danger">ログイン</button></p>
</form>

<div id="applogin">
  <h2>お持ちのアカウントでログイン</h2>
  <ul>
    <li><a href="/login/google"><span class="comment">google</span><img src="{{ asset('img/google.png',$is_production) }}" alt="google"></a></li>
    <li><a href="/login/twitter"><span class="comment">twitter</span><img src="{{ asset('img/twitter.png',$is_production) }}" alt="twitter"></a></li>
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
  #content{
    margin-bottom: 50px;
  }
  footer {
    position: absolute;
    bottom: 0;
    left: 0;
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
  #signup{
    margin-bottom:20px;
  }
</style>

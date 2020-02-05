@extends('layout.user')

<!-- head -->
@section('title', 'Signup')
@section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="{{asset('css/bootstrap-social-gh-pages/bootstrap-social.css')}}" />
<link rel="stylesheet" href="{{asset('css/signup.css')}}" />
@endsection
@include('common.head')

<!-- header -->
@include('common.user.header')

<!-- content -->
@section('content')
<h1 id="title">新規会員登録</h1>
<div id="signup">
    <a href="signup/form"><button type="button" class="btn btn-primary"><span class="fa fa-envelope"></span>メールで登録</button></a>
    <a href="login/google"><button type="button" class="btn btn-danger"><span class="fa fa-google"></span>Googleで登録</button></a>
    <a href="login/twitter"><button type="button" class="btn btn-info"><span class="fa fa-twitter"></span>Twitterで登録</button></a>
</div>
@endsection

<!-- footer -->
@include('common.user.footer')
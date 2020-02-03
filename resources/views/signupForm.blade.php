@extends('layout.user')

<!-- head -->
@section('title', 'SignupForm')
@section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="{{asset('css/bootstrap-social-gh-pages/bootstrap-social.css')}}" />
<link rel="stylesheet" href="{{asset('css/signupForm.css')}}" />
@endsection
@include('common.head')

<!-- header -->
@include('common.user.header')

<!-- content -->
@section('content')
<form action="{{ url('/signup/form') }}" method="post">
    {{ csrf_field() }}
    @if($errors)
        <p>{{$errors->first('postal_code')}}</p>
    @endif
    <div class="form-group">
        <label for="name">氏名：</label>
        <input type="text" id="name" class="form-control" name="name" value="" required>
    </div>

    <div class="form-group">
        <label for="email">メールアドレス：</label>
        <input type="email" id="email" class="form-control" name="email" value="" required>
    </div>

    <div class="form-group">
        <label for="password">Password：</label>
        <p><input type="password" id="password" class="form-control" name="password" value="" placeholder="8文字以上の英数字" pattern="^[0-9A-Za-z]+$" required></p>
    </div>

    <p><span>「会員登録」のボタンを押すことにより、利用規約に同意したものとみなします</span></p>
    <p><button type="submit" class="btn btn-danger">会員登録</button></p>
</form>

@endsection

<!-- footer -->
@include('common.user.footer')
@extends('layout.layout')

<!-- head -->
@section('title', 'Mypage')
@section('style')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />

<script src="{{ asset('js/hbg.js') }}" defer></script>
@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<h2>{{ $user->name }}さんのMyPage</h2>
<ul id="mypage_menu">
    <li>会員情報</li>
    <li>お知らせ</li>
    <li>所持ポイント:{{1000000}}pt</li>
    <li>支払い情報</li>
</ul>
<div id="member_setting">
    <h2>会員情報</h2>
    <ul>
        <li>アイコン変更</li>
        <li>名前変更</li>
        <li>メール変更</li>
        <li>パスワード変更</li>
    </ul>
</div>
<div id="information">
    <h2>お知らせ</h2>
    <ul>
        @for($i = 0 ; $i < 10 ; $i++)
        <li>test{{$i}}</li>
        @endfor
    </ul>
</div>
<div id="payment">
    <h2>支払い情報</h2>
</div>
@endsection

<!-- footer -->
@include('common.footer')
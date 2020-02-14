@extends('layout.layout')

<!-- head -->
@section('title', 'Music')
@section('style')
<link rel="stylesheet" href="{{asset('css/music.css')}}" />

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<h2>{{ $user->name }}さんの音楽再生ページ</h2>
@endsection

<!-- footer -->
@include('common.footer')

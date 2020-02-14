@extends('layout.layout')

<!-- head -->
@section('title', 'PlayList')
@section('style')
<link rel="stylesheet" href="{{asset('css/playlist.css')}}" />

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<h2>{{ $user->name }}さんのプレイリスト</h2>
@endsection

<!-- footer -->
@include('common.footer')

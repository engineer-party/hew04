@extends('layout.layout')

<!-- head -->
@section('title', 'Search')
@section('style')
<link rel="stylesheet" href="{{asset('css/search.css')}}" />

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<h2>検索画面</h2>
@endsection

<!-- footer -->
@include('common.footer')

@extends('layout.layout')

<!-- head -->
@section('title', 'Report')
@section('style')
<link rel="stylesheet" href="{{asset('css/report.css')}}" />

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<h2>通報投稿フォーム</h2>
@endsection

<!-- footer -->
@include('common.footer')

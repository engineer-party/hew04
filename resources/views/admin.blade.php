@extends('layout.layout')

<!-- head -->
@section('title', 'Admin')
@section('style')
<link rel="stylesheet" href="{{asset('css/admin.css')}}" />

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<h2>管理者ログイン画面</h2>
@endsection

<!-- footer -->
@include('common.footer')

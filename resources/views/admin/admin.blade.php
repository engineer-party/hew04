@extends('layout.admin')

<!-- head -->
@section('title', 'Admin')
@section('style')
<link rel="stylesheet" href="{{asset('css/admin.css')}}" />

@endsection
@include('common.admin_head')

<!-- header -->
@include('common.admin_header')

<!-- content -->
@section('content')
<h2>管理者ログイン画面</h2>
@endsection

<!-- footer -->
@include('common.admin_footer')

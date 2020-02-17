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
<h1 id="title">通報が完了しました。</h1>
@endsection

<!-- footer -->
@include('common.footer')

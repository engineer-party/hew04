@extends('layout.layout')

<!-- head -->
@section('title', 'Top')
@section('style')
<link rel="stylesheet" href="{{asset('css/top.css')}}" />

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')

@endsection

<!-- footer -->
@include('common.footer')

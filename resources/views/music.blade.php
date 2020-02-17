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
@endsection

<!-- footer -->
@include('common.footer')

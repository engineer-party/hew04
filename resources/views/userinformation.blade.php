@extends('layout.layout')

<!-- head -->
@section('title', 'PlayList')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />

<script src="{{ asset('js/hbg.js') }}" defer></script>

<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/css/uikit.min.css" />
<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/js/uikit-icons.min.js"></script>

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="message">
    <h2 class="uk-text-center uk-text-small uk-text-danger">お知らせ</h2>
    <ul class="uk-list uk-list-striped uk-list-large">
        @for($i = 1; $i <= 10; $i++)
        <li>tes{{$i}}</li>
        @endfor
    </ul>
</div>
@endsection

<!-- footer -->
<style type="text/css">
@include('common.footer')
{{--header--}}
* {
    margin: 0;
    padding: 0;
  }
  #wrapper {
    position: fixed;
    width: 100%;
    height: 100vh;
    background-color: aliceblue;
  }
  #app .form {
    display: none;
  }
  #app {
    width: 100%;
    background-color: #ff5757;
  }
  #app .menu-trigger{
    top: 22px;
    left: 30px;
  }
  #app h1{
    padding: 20px;
    padding-left: 65px;
    padding-bottom: 40px;
    color: white;
    font-size: 1.2em;
    letter-spacing: 4px;
  }
  {{--end_header--}}
  </style>
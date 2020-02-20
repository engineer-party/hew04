@extends('layout.layout')

<!-- head -->
@section('title', 'PlayList')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />

<script src="{{ asset('js/playlist.js') }}" defer></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<nav id="navber">
  <ul>
    <li>プレイリスト</li>
    <li>曲</li>
    <li>アーティスト</li>
    <li>アルバム</li>
  </ul>
</nav>

@endsection

<!-- footer -->
@include('common.footer')

<style type="text/css">
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
    height: 12%;
    background-color: #ff5757;
  }
  #app .menu-trigger{
    top: 25px;
  }
  #app h1{
    position: absolute;
    top: 22px;
    left: 70px;
    color: white;
    font-size: 1.2em;
    letter-spacing: 4px;
  }
  #navber {
    position: fixed;
    width: 100%;
    background-color: #ff5757;
    overflow-x: scroll;
  }
  #navber ul{
    display: flex;
    width: 400px;
  }
  #navber li{
    color: white;
    line-height: 40px;
    height: 40px;
    width: 100px;
/*    background-color: aqua;*/
/*    border: solid black 1px;*/
    text-align: center;
    font-size: 0.8em;
  }
  #navber li:nth-child(1){
    border-bottom: solid white 3px;
  }
</style>

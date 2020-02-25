@extends('layout.layout')

<!-- head -->
@section('title', 'PlayList')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />

<script src="{{ asset('js/library.js') }}" defer></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="contents">
<nav id="navber">
  <ul>
    <li><a class="library-link ajax-action" 
    v-on:click='activetab=1'
    v-bind:class="[ activetab === 1 ? 'active' : '' ]">プレイリスト</a></li>
    <li><a class="library-link ajax-action" 
    v-on:click='activetab=2'
    v-bind:class="[ activetab === 2 ? 'active' : '' ]">曲</a></li>
    <li><a class="library-link ajax-action" 
    v-on:click='activetab=3'
    v-bind:class="[ activetab === 3 ? 'active' : '' ]">アーティスト</a></li>
    <li><a class="library-link ajax-action" 
    v-on:click='activetab=4'
    v-bind:class="[ activetab === 4 ? 'active' : '' ]">アルバム</a></li>
  </ul>
</nav>

<section
class="activeobj1 box"
v-bind:class="[ activetab === 1 ? 'activeobj' : '' ]"></section>
<section
class="activeobj2 box"
v-bind:class="[ activetab === 2 ? 'activeobj' : '' ]"></section>
<section
class="activeobj3 box"
v-bind:class="[ activetab === 3 ? 'activeobj' : '' ]"></section>
<section
class="activeobj4 box"
v-bind:class="[ activetab === 4 ? 'activeobj' : '' ]"></section>

</div>
@endsection

<!-- footer -->
@include('common.footer')

<style type="text/css">
  * {
    margin: 0;
    padding: 0;
  }
/*
  #wrapper {
    position: fixed;
    width: 100%;
    height: 100vh;
    background-color: aliceblue;
  }
*/
  #app .form {
    display: none;
  }
  #app {
    width: 100%;
    background-color: #ff5757;
    position: relative;
    z-index: 100;
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
  #navber {
    position: relative;
    width: 100%;
    background-color: #ff5757;
    overflow-x: scroll;
    justify-content: space-around;
    z-index: 100;
    box-shadow: 2px 2px 3px rgba(0,0,0,0.3);
  }
  #navber ul{
    display: flex;
    width: 400px;

  }
  #navber li{
    color: white;
/*    background-color: aqua;*/
/*    border: solid black 1px;*/
    text-align: center;
    font-size: 0.8em;
    width: calc(100% / 4);
  }
  .library-link {
    display: block;
    line-height: 40px;
    height: 40px;
    padding: 0;
    margin: 0;
/*    border: solid black 1px;*/
    width: 100%;
    font-size: 0.8em;
    background-color: #ff5757;
    color: white;
/*    left: 10px;*/
  }
  
  .box {
    width: 95%;
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-200%);
    height: 100vh;
    transition: transform 350ms cubic-bezier(0, 0, 0.2, 1) 0ms;
  }
  .activeobj1 {
    background-color: aqua;
  }
  .activeobj2 {
    background-color: blueviolet;
  }
  .activeobj3 {
    background-color: chartreuse;
  }
  .activeobj4 {
    background-color: darkorange;
  }

  /*----- addclass -----*/
  .active {
    border-bottom: solid white 3px;
  }
  .activeobj {
    transform: translate(-50%);
  }
</style>

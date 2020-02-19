@extends('layout.layout')

<!-- head -->
@section('title', 'Top')
@section('style')
<link rel="stylesheet" href="{{asset('css/top.css')}}" />
<script src="{{ asset('js/top.js') }}" defer></script>
@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<!--
  <transition :name="transition">
    <section id="search" v-if="searchOpen">
     <!--
      <div id="app-search" v-if="searchOpen">
        <ul>
          <li v-for="item in items"><span>Logo</span>@{{ item.message }}</li>
        </ul>
      </div>
    </section>
  </transition>
-->
@endsection

<!-- footer -->
@include('common.footer')

<style type="text/css">
  * {
    padding: 0;
    margin: 0;
    text-decoration: none;
    list-style-type: none;
  }
  #login_btn{
    display: none;
  }
  #app {
    position: fixed;
    top: 10px;
    left: 50%;
    transform: translate(-50%);
    width: 95%;
    height: 45px;
    border-radius: 2px;
    background-color: #ff5757;
/*      background-color: aqua;*/
    display: flex;
    z-index: 100;
  }
  #app nav{
    width: auto;
  }
  #app p{
      width: 70%;
  }
  #app .form{
    height: 45px;
    width: 100%;
    border-radius: 10px;
    background-color: #ff5757;
/*    background-color: black;*/
    color: white;
    border: none;
    padding: 0;
    border: none;
    border-radius: 0;
    outline: none;
    caret-color: yellow;
    margin-left: 50px;
/*    background-image: url(img/headerImg.png);*/
    background-position: left;
    background-repeat: no-repeat;
    background-size: 90%;
  }
  #link {
    position: absolute;
    width: 100vw;
    height: 100vh;
    top: -10px;
    left: -1010px;
/*    background: rgba(0,0,0,0.6);*/
    transition: all 0.3s cubic-bezier(0, 0, 0.2, 1) 0s;
  }
  #link-in{
    height: 100vh;
    width: 85%;
/*    transition: all .3s ease-out 0s;*/
    background-color: white;
  }
  .form::placeholder {
    color: white;
  }
/*
    input:focus {
    }
    #app-search {
      margin: 0 auto;
      margin-top: 140px;
      border-top: solid white 1px;
      width: 90%;
      height: auto;
      background-color: #ff5757;
    }
    #app-search li{
      line-height: 120px;
      font-size: 2.2em;
      color: white;
    }
    #app-search span{
      width 70px;
      margin: 30px;
      margin-right: 35px;
    }
    #search {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 100%;
      background: rgba(0,0,0,0.6);
    }
/*------ hunberger ------*/

  nav .menu-trigger,
  .menu-trigger span {
    display: inline-block;
    transition: all .3s ease-out 0s;
    box-sizing: border-box;
  }
  .menu-trigger {
    position: relative;
    top: 15px;
    left: 25px;
    width: 22px;
    height: 16px;
    display: block;
  }
  .menu-trigger div{
    position: absolute;
    width: 22px;
    height: 2px;
    background-color: white;
    border-radius: 2px;
  }
  nav .menu-trigger div:nth-of-type(1) {
    top: 0px;
  }
  nav .menu-trigger div:nth-of-type(2) {
    top: 7px;
  }
  nav .menu-trigger div:nth-of-type(3) {
    bottom: 0px;
  }
    
  /*------ hunberger animate ------*/
  .menu-trigger.active{
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
  .menu-trigger.active div:nth-of-type(1),
  .menu-trigger.active div:nth-of-type(3) {
    width: 12px;
  }
  .menu-trigger.active div:nth-of-type(1) {
    -webkit-transform: translate(-1px,3px) rotate(-45deg);
    transform: translate(-1px,3px) rotate(-45deg);
  }
  .menu-trigger.active div:nth-of-type(3) {
    -webkit-transform: translate(-1px,-3px) rotate(45deg);
    transform: translate(-1px,-3px) rotate(45deg);
  }
    
/*-----transition-----*/
  /* top */
  .top-enter-active, .top-leave-active {
    transform: translate(0px, 0px);
    transition: transform 350ms cubic-bezier(0, 0, 0.2, 1) 0ms;
  }

  .top-enter, .top-leave-to {
    transform: translateY(-100vh) translateY(0px);
  }
    
  /* fade */
  .fade-enter-active, .fade-leave-active {
    will-change: opacity;
    transition: opacity 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
  }
  .fade-enter, .fade-leave-to {
    opacity: 0
  }
  /* end */
  
  /*-----link animate-----*/
  .link-active{
    transform: translateX(1000px);
    background: rgba(0,0,0,0.6);
  }
    
  </style>

@extends('layout.layout')

<!-- head -->
@section('title', 'Top')
@section('style')
<link rel="stylesheet" href="{{asset('css/top.css')}}" />
<link rel="stylesheet" href="{{asset('css/top-header.css')}}" />
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />

<script src="{{ asset('js/top.js') }}" defer></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>

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

<!-- 付近のプレイリスト（配信） -->

<div id="playlist-link">
 <button type="button">
   <h2 class="title">近くでライブ中</h2>
   <p class="detail">付近で配信中のプレイリストを表示</p>
 </button>
</div>
<!-- END -->

<!-- キャンペーン -->
<div class="campaign">
  <button>
    <h2 class="title">キャンペーンタイトル</h2>
    <p class="detail">キャンペーン内容</p>
  </button>
</div>
<!-- END -->

<!-- キャンペーン -->
<div class="campaign">
  <button>
    <h2 class="title">キャンペーンタイトル</h2>
    <p class="detail">キャンペーン内容</p>
  </button>
</div>
<!-- END -->


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
  #wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    overflow-y: scroll;
  }
  #app h1{
    display: none;
  }
  #app .menu-trigger {
    top: 14px;
    left: 15px;
  }
  #playlist-link button{
    background: none;
    border: none;
    padding: 0;
    border: none;
    border-radius: 0;
    outline: none;
    text-align: left;
    width: 100%;
    height: 300px;
    background-color: aqua;
  }
  #playlist-link .title,
  .campaign .title{
    width: calc(100% - 20px);
    position: relative;
    top: 60px;
    left: 20px;
    color: white;
    font-size: 1.5em;
    font-weight: 600;
  }
  #playlist-link .detail,
  .campaign .detail{
    width: calc(100% - 20px);
    position: relative;
    color: gray;
    top: 70px;
    left: 20px;
    font-size: 0.7em;
    letter-spacing: 2px;
  }
  .campaign button{
    background: none;
    border: none;
    padding: 0;
    border: none;
    border-radius: 0;
    outline: none;
    text-align: left;
    width: 100%;
    height: 300px;
    background-color: blueviolet;
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
  
    
  </style>

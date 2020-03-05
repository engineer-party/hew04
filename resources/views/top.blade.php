@extends('layout.layout')

<!-- head -->
@section('title', 'Top')
@section('style')
<link rel="stylesheet" href="{{asset('css/top.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/top-header.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/link.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css',$is_production)}}" />

<script src="{{ asset('js/top.js',$is_production) }}" defer></script>
<script src="{{ asset('js/hbg.js',$is_production) }}" defer></script>

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')

<!-- 付近のプレイリスト（配信） -->
<a href="{{ action('HuntController@index') }}">
<div id="playlist-link">
  <ul>
    <li class="title">近くでライブ中</li>
    <li class="detail">付近で配信中のプレイリストを表示</li>
  </ul>
</div>
</a>
<!-- END -->

<!-- キャンペーン -->
@foreach ($campaigns as $campaign)
<a href="/search/campaign/{{ $campaign->name }}">
<div class="campaign type{{ $loop->iteration % 3 }}">
  <ul>
  <li class="title">{{ $campaign->name }}</li>
  <li class="detail">{{ $campaign->content }}</li>
  </ul>
</div>
</a>
@endforeach
<!-- END -->




@endsection

<!-- footer -->
@include('common.footer')

<style type="text/css">
  
  /*
  red: #ff5757
  brown: #613b3b
  black: #404040
  
  pink: #ff9e85
  bule-middle: #49ada4
  bule-light: #b3e6e0
  bule-heavy: #436d6c
  */
  
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
    background-color: #404040;
  }
  #app h1{
    display: none;
  }
  #app .menu-trigger {
    top: 14px;
    left: 15px;
  }
  #playlist-link {
    
  }
  #playlist-link{
    text-align: left;
    width: 100%;
    height: 300px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-image: url({{ asset('img/streaming-bg.png',$is_production) }});
  }
  #playlist-link ul,
  .campaign ul{
    position: relative;
    top: 60%;
    margin-left: 20px;
  }
  #playlist-link .title,
  .campaign .title{
    width: calc(100% - 20px);
/*    position: relative;*/
/*    top: 50%;*/
/*    left: 20px;*/
    color: white;
    margin-bottom: 20px;
    font-size: 1.5em;
    font-weight: 600;
  }
  #playlist-link .detail,
  .campaign .detail{
    width: calc(100% - 20px);
    color: white;

    font-size: 0.7em;
    letter-spacing: 2px;
  }
  .campaign,
  campaign{
    text-align: left;
    width: 100%;
    height: 300px;
  }
  .type1 {
    background-color: #f8a8c5;
  }
  .type2 {
    background-color: #fbd160;
  }
  .type0 {
    background-color: #de5e97;
  }
  #form::placeholder {
    color: white;
  }
  
  
  #link-list li:nth-child(1){
    background: rgba(0,0,0,0.1);
  }
  #link-list li:nth-child(1) .link-title{
    color: #ff5757;
  }
  #link-list li:nth-child(1)::before{
    background-image: url({{ asset('img/home-active.png',$is_production) }});
  }
  #link-list li:nth-child(2)::before{
    background-image: url({{ asset('img/hunt.png',$is_production) }});
  }
  #link-list li:nth-child(3)::before{
    background-image: url({{ asset('img/streaming.png',$is_production) }});
  }
  #link-list li:nth-child(4)::before{
    background-image: url({{ asset('img/playlist.png',$is_production) }});
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

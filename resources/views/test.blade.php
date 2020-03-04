@extends('layout.layout')

<!-- head -->
@section('title', 'Hunt')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />

<script src="{{ asset('js/audio.min.js') }}" defer></script>
<script src="{{ asset('js/test.js') }}" defer></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>
@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="contents">
  <h2>CD</h2>
  <audio src="{{ asset('img/mp3/01.mp3') }}" preload="auto"></audio>  //プレイヤー（再生バー）
<!--
<div class="cd">
    <ol>
        <li><a data-src="{{ asset('img/mp3/01.mp3') }}">Song 1</a></li>
        <li><a data-src="{{ asset('img/mp3/02.mp3') }}">Song 2</a></li>
        <li class="last"><a data-src="{{ asset('img/mp3/03.mp3') }}">Song 3</a></li>
    </ol>
</div><!-- end of .cd -->
-->
</div>
@endsection

<!-- footer -->
@include('common.footer')

<style type="text/css">
  
  
   
  /*　プレイヤー（再生バー）の高さ、幅、背景色の指定　*/
  .audiojs { height: 50px; background: #404040; width: 100%;}
  /*　再生・停止ボタンの高さ、幅、パディングの指定　*/
  .audiojs .play-pause {
    width: 50px;
    height: 50px;
    padding: 0px 8px 0px 0px;
    display: block;
    background-color: black;
    color: black;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
  }
  /*　再生・停止ボタンなどの p 要素　*/
  .audiojs p {
    width: 50px;
    height: 50px;
/*    margin: -3px 0px 0px -1px;*/
    color: black;
/*    background-color: black;*/
  }
  .audiojs .play{
    width: 40px;
    height: 40px;
    background-color: aqua;
    border-radius: 20px;
    background-size: 200px;
    background-repeat: no-repeat;
    background-position: center;
    background: url({{ asset('js/player-graphics.gif') }});
  }
  /*　進行状態・ロードの状態を表示する部分　*/
  .audiojs .scrubber{
    background-color: white;
    width: 100%;
    height: 8px;
/*    margin: 5px;*/
  }
  /*　進行状態を表示するバーの部分　*/
  .audiojs .progress {
    height: 10px;
    width: 0px;
    background-color: red;
  }
  /*　ロード状態を表示するバーの部分　*/
  .audiojs .loaded {
    height: 10px;
    display: none;
/*    background: #000;*/
  }
  /*　再生時間の部分　*/
  .audiojs .time {
/*    display: flex;*/
/*    float: left;*/
    height: 25px;
    line-height: 25px;
  }
  .audiojs .error-message {
    height: 24px;
    line-height: 24px;
  }
  /*　再生している曲の情報　*/
  .track-details {
    clear: both;
    height: 20px;
    width: 280px;
    padding: 1px 6px;
    background-color: #eee;
    color: #222;
    font-size: 11px;
    line-height: 20px;
  }
  .track-details:before { content: '';}
  
  
  
  #app .search{
    display: none;
  }
  
  #link-list li:nth-child(1)::before{
    background-image: url({{ asset('img/home.png') }});
  }
  #link-list li:nth-child(2)::before{
    background-image: url({{ asset('img/hunt-active.png') }});
  }
  #link-list li:nth-child(3)::before{
    background-image: url({{ asset('img/streaming.png') }});
  }
  #link-list li:nth-child(4)::before{
    background-image: url({{ asset('img/playlist.png') }});
  }
  #link-list li:nth-child(2) {
    background: rgba(0, 0, 0, 0.1);
  }

  #link-list li:nth-child(2) .link-title {
    color: #ff5757;
  }
  
#wrapper {
height: 100vh;
width: 100%;
position: fixed;
top: 0;
left: 0;
background-color:aliceblue;
  overflow-y: scroll;
}
#app #form {
display: none;
}
#app {
  position: fixed;
  top: 0;
  left: 0;
width: 100%;
/*height: 10%;*/
background-color: #ff5757;
}
#app .menu-trigger{
top: 22px;
left: 30px;
}
#app h1{
height: auto;
padding: 20px;
padding-left: 65px;
/* margin-bottom: -50px*/
color: white;
font-size: 1.2em;
letter-spacing: 4px;
}
  #contents {
    padding-top: 140px;
  }
</style>
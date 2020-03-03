@extends('layout.layout')

<!-- head -->
@section('title', 'Mypage')
@section('style')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}" />
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />

<script src="{{ asset('js/music.js') }}" defer></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>


@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
 <article id="mypage">
<div class="contents">
  <div class="img">
  </div>
  
  <div class="text">
    <ul>
      <li><span class="value">I LOVE ROCK'N ROLL</span><br><span class="text-in">タイトル</span></li>
      <li><span class="value">Joan Jett</span><br><span class="text-in">アーティスト</span></li>
      <li><span class="value">3:36</span><br><span class="text-in">再生時間</span></li>
    </ul>
  </div>
  <button class="btn buy-btn"><span class="point-icon">P</span>250</button>
  </div>
</article>
@endsection

<!-- footer -->
@include('common.footer')

<script>
  
</script>


<style>
  
  #link-list li:nth-child(1)::before{
    background-image: url({{ asset('img/home.png') }});
  }
  #link-list li:nth-child(2)::before{
    background-image: url({{ asset('img/hunt.png') }});
  }
  #link-list li:nth-child(3)::before{
    background-image: url({{ asset('img/streaming.png') }});
  }
  #link-list li:nth-child(4)::before{
    background-image: url({{ asset('img/playlist.png') }});
  }
  #app .search{
    display: none;
  }
  
  
  .img {
    background-image: url({{ asset('img/joan-jett.jpg') }});
  }
  .img::before{
    content: "I LOVE ROCK'N ROLL";
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    letter-spacing: 0px;
  }
  
* {
    margin: 0;
    padding: 0;
  }

  #wrapper {
    width: 100%;
    height: 100vh;
    background-color: #FFEBE0;
    position: fixed;
    top: 0;
    left: 0;
  }

  #app #form {
    display: none;
  }

  #app {
    width: 100%;
/*    background-color: #ff5757;*/
    position: relative;
    top: 0;
    left: 0;
    z-index: 100;
  }

  #app .menu-trigger {
    top: 22px;
    left: 30px;
  }

  #app h1 {
    padding: 20px;
    padding-left: 65px;
    padding-bottom: 20px;
    color: white;
    font-size: 1.2em;
    letter-spacing: 4px;
  }
  
  .buy-btn {
    width: 90%;
/*    margin: 0 auto;*/
    position: relative;
    left: 50%;
    transform: translate(-50%);
    line-height: 50px;
    height: 50px;
    color: #ff5757;
    background-color: white;
    margin-top: 50px;
    font-size: 1.0em;
  }
  
  .text {
    padding-top: 10px;
  }
  
</style>
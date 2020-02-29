@extends('layout.layout')

<!-- head -->
@section('title', 'Hunt')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />

<script src="{{ asset('js/hunt.js') }}" defer></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>
@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="contents">
  <h2>ハント可能な楽曲</h2>
  
  <!-- 曲 -->
  <div class="content">
    <p class="account"><span class="dot">・・・</span><span>アカウント名</span>さんが公開中<span class="dot">・・・</span></p>
    <div class="music">
      <div class="musicIcon"></div>
      <p><img src="{{ asset('img/Hunc Logo.png') }}" alt=""></p>
      <ul>
        <li class="title">title</li>
        <li class="artist">artist</li>
      </ul>
    </div>
  </div>
  <!-- END -->
  
  <!-- 曲 -->
  <div class="content">
    <p class="account"><span class="dot">・・・</span><span>アカウント名</span>さんが公開中<span class="dot">・・・</span></p>
    <div class="music">
      <div class="musicIcon"></div>
      <p><img src="{{ asset('img/Hunc Logo.png') }}" alt=""></p>
      <ul>
        <li class="title">title</li>
        <li class="artist">artist</li>
      </ul>
    </div>
  </div>
  <!-- END -->
  
  <!-- 曲 -->
  <div class="content">
    <p class="account"><span class="dot">・・・</span><span>アカウント名</span>さんが公開中<span class="dot">・・・</span></p>
    <div class="music">
      <div class="musicIcon"></div>
      <p><img src="{{ asset('img/Hunc Logo.png') }}" alt=""></p>
      <ul>
        <li class="title">title</li>
        <li class="artist">artist</li>
      </ul>
    </div>
  </div>
  <!-- END -->
</div>
@endsection

<!-- footer -->
@include('common.footer')

<style type="text/css">
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
  padding-top: 15%;
width: 90%;
height: 100vh;
margin: 0 auto;
background-color: white;
}
#contents h2{
color: #ff5757;
width: 100%;
font-size: 1.0em;
text-align: center;
line-height: 70px;
}
.content .music{
display: flex;
width: 100%;
box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
}
.content .musicIcon{
/*position: relative;*/
/*top: 21px;*/
/*left: 15px;*/
margin-top: 21px;
margin-left: 15px;
border-bottom: solid gray 2px;
border-top: solid gray 2px;
width: 15px;
height: 8px;
display: block;
z-index: 2;
}
.content .account{
width: 100%;
font-size: 0.8em;
color: gray;
text-align: center;
line-height: 40px;
height: 40px;
}
.content .account .dot{
margin-left: 10px;
margin-right: 10px;
letter-spacing: 5px;
}
.content img{
width: 50px;
height: 50px;
/* border: solid black 1px;*/
margin-left: 5px;
}
.content ul{
margin-left: 10px;
height: 50px;
}
.content .title{
font-size: 1.1em;
line-height: 30px;
/* background-color: aqua;*/
}
.content .artist{
font-size: 0.8em;
color: gray;
/* line-height: 20px;*/
/* background-color: aquamarine;*/
}</style>
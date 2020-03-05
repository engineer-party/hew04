@extends('layout.layout')

<!-- head -->
@section('title', 'Hunt')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css',$is_production)}}" />

<script src="{{ asset('js/hunt.js',$is_production) }}" defer></script>
<script src="{{ asset('js/hbg.js',$is_production) }}" defer></script>
@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="contents">
  <h2>ハント可能なプレイリスト</h2>
  
  <!-- 曲 -->
  <div class="content">
    <div class="music">
     <ul>
       <li class="account-img"><img src="{{ asset('img/Hunc Logo.png',$is_production) }}" alt=""></li>
       <li class="account-name">アカウント名</li>
     </ul>
    <p class="account-title">プレイリスト名</p>
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
    background-image: url({{ asset('img/home.png',$is_production) }});
  }
  #link-list li:nth-child(2)::before{
    background-image: url({{ asset('img/hunt-active.png',$is_production) }});
  }
  #link-list li:nth-child(3)::before{
    background-image: url({{ asset('img/streaming.png',$is_production) }});
  }
  #link-list li:nth-child(4)::before{
    background-image: url({{ asset('img/playlist.png',$is_production) }});
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
  background-color: #FFEBE0;
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
  width: 95%;
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
  padding-top: 5px;
  padding-bottom: 5px;
  width: 100%;
  display: flex;
  justify-content: space-between;
  box-shadow: 0px 0px 5px rgba(0,0,0,0.3);
}
.content .account-img img{
width: 50px;
height: 50px;
/* border: solid black 1px;*/
margin-left: 5px;
}
.content ul{
/*  margin-left: 10px;*/
/*  background-color: aqua;*/
  width: 55%;
  height: 50px;
  display: flex;
/*  justify-content: space-b;*/
}
.content .account-name{
  font-size: 0.9em;
  margin-left: 10px;
  line-height: 50px;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
/* background-color: aqua;*/
}
.content .account-title{
  font-size: 0.8em;
  width: 40%;
  height: 50px;
  line-height: 50px;
  text-align: right;
  margin-right: 10px;
  color: gray;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
/* line-height: 20px;*/
/* background-color: aquamarine;*/
}</style>
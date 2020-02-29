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
<h3></h3>
<!--繰り返し要素・ポイント-->
<div class="point">
  <ul>
    <li class="point-icon">P</li>
    <li class="point-value">120 P</li>
  </ul>
  <p class="point-survice">+1000P</p>
  <button class="btn point-buy">¥120</button>
</div>
<!-- END -->

<!--繰り返し要素・ポイント-->
<div class="point">
  <ul>
    <li class="point-icon">P</li>
    <li class="point-value">120 P</li>
  </ul>
  <p class="point-survice">+1000P</p>
  <button class="btn point-buy">¥120</button>
</div>
<!-- END -->

<!--繰り返し要素・ポイント-->
<div class="point">
  <ul>
    <li class="point-icon">P</li>
    <li class="point-value">120 P</li>
  </ul>
  <p class="point-survice">+1000P</p>
  <button class="btn point-buy">¥120</button>
</div>
<!-- END -->

<!--繰り返し要素・ポイント-->
<div class="point">
  <ul>
    <li class="point-icon">P</li>
    <li class="point-value">120 P</li>
  </ul>
  <p class="point-survice">+1000P</p>
  <button class="btn point-buy">¥120</button>
</div>
<!-- END -->

<!--繰り返し要素・ポイント-->
<div class="point">
  <ul>
    <li class="point-icon">P</li>
    <li class="point-value">120 P</li>
  </ul>
  <p class="point-survice">+1000P</p>
  <button class="btn point-buy">¥120</button>
</div>
<!-- END -->

<!--繰り返し要素・ポイント-->
<div class="point">
  <ul>
    <li class="point-icon">P</li>
    <li class="point-value">120 P</li>
  </ul>
  <p class="point-survice">+1000P</p>
  <button class="btn point-buy">¥120</button>
</div>
<!-- END -->

</div>
  
@endsection

<!-- footer -->
@include('common.footer')

<style type="text/css">
  #link-list li:nth-child(4) {
    background: rgba(0, 0, 0, 0.1);
  }

  #link-list li:nth-child(4) .link-title {
    color: #ff5757;
  }

  #link-list li:nth-child(1)::before {
    background-image: url({{ asset('img/home.png')}});
  }
  
  #link-list li:nth-child(2)::before {
    background-image: url({{ asset('img/hunt.png')}});
  }
  
  #link-list li:nth-child(3)::before {
    background-image: url({{ asset('img/streaming.png')}});
  }
  
  #link-list li:nth-child(4)::before {
    background-image: url({{ asset('img/playlist-active.png')}});
  }
  
  #app .search{
    display: none;
  }
  
  * {
    margin: 0;
    padding: 0;
  }

  #wrapper {
    width: 100%;
    height: 100vh;
    background-color: #FFEBE0;
  }

  #app #form {
    display: none;
  }

  #app {
    width: 100%;
    background-color: #ff5757;
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
  #contents {
    width: 95%;
    margin: 0 auto;
    margin-top: 50px;
  }
  .point {
    display: flex;
    width: 100%;
    height: 50px;
    justify-content: space-around;
    background-color: white;
    border-radius: 4px;
    margin-bottom: 10px;
  }
  .point ul{
    display: flex;
  }
  .point .point-icon{
    background-color: goldenrod;
    width: 30px;
    height: 30px;
    border-radius: 15px;
    margin-top: 10px;
    text-align: center;
    line-height: 28px;
    font-weight: 600;
    border: solid gold 2px;
    color: gold;
  }
  .point .point-value{
    margin-left: 10px;
    height: 50px;
    width: 20vw;
    line-height: 50px;
/*    background-color: coral;*/
  }
  .point .point-survice{
    height: 50px;
    width: 25%;
    line-height: 50px;
/*    background-color: darkcyan;*/
    font-size: 0.8em;
    text-align: left;
    color: #ff5757;
  }
  .point .point-buy{
    width: 20%;
    height: 40px;
    margin-top: 5px;
    background-color: #ff5757;
    color: white;
  }
  
</style>
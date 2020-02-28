@extends('layout.layout')

<!-- head -->
@section('title', 'Search')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />
<link rel="stylesheet" href="{{asset('css/search.css')}}" />

<script src="{{ asset('js/search.js') }}" defer></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>


@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="contents">
  <section id="artist">
    <ul class="contents-head">
      <li>アーティスト</li>
      <li><button class="btn ajax-active">+30件</button></li>
    </ul>
    <div class="artist-contents">

    <!--繰り返し要素・アーティスト ※最初の4つ-->
    <div class="artist-content">
      <div class="artist-img"><img src="{{ asset('img/joan-jett.jpg') }}" alt=""></div>
      <h3>アーチスト名</h3>
    </div>
    <!-- END -->
    
    <!--繰り返し要素・アーティスト ※最初の4つ-->
    <div class="artist-content">
      <div class="artist-img"><img src="{{ asset('img/joan-jett.jpg') }}" alt=""></div>
      <h3>アーチスト名</h3>
    </div>
    <!-- END -->
    
    <!--繰り返し要素・アーティスト ※最初の4つ-->
    <div class="artist-content">
      <div class="artist-img"><img src="{{ asset('img/joan-jett.jpg') }}" alt=""></div>
      <h3>アーチスト名</h3>
    </div>
    <!-- END -->
    
    <!--繰り返し要素・アーティスト ※最初の4つ-->
    <div class="artist-content">
      <div class="artist-img"><img src="{{ asset('img/joan-jett.jpg') }}" alt=""></div>
      <h3>アーチスト名</h3>
    </div>
    <!-- END -->
    
    </div>
  </section>
<!--
  <section id="album">
    <h2>アルバム</h2>
    <div class="album-contents">
    
    <!--繰り返し要素・アルバム ※最初の4つ
    <div class="album-content">
      <div class="album-img">
        <img src="{{ asset('img/cheep-trick.jpg') }}" alt="">
      </div>
      <ul>
        <li>アルバム名</li>
        <li>アーティスト名</li>
      </ul>
    </div>
    <!-- END -->
    
<!--
    </div>
  </section>
-->
  <section id="music">
    <ul class="contents-head">
    <li>曲</li>
      <li><button class="btn ajax-active">+20件</button></li>
    </ul>
    <div class="music-contents">
      
      <!--繰り返し要素・曲 ※最初の5つ-->
      <div class="music-content">
        <p><img src="{{ asset('img/cheep-trick.jpg') }}" alt=""></p>
        <ul>
          <li class="title">title</li>
          <li class="artist">artist</li>
        </ul>
      </div>
      <!-- END -->
      
      <!--繰り返し要素・曲 ※最初の5つ-->
      <div class="music-content">
        <p><img src="{{ asset('img/cheep-trick.jpg') }}" alt=""></p>
        <ul>
          <li class="title">title</li>
          <li class="artist">artist</li>
        </ul>
      </div>
      <!-- END -->
      
      <!--繰り返し要素・曲 ※最初の5つ-->
      <div class="music-content">
        <p><img src="{{ asset('img/cheep-trick.jpg') }}" alt=""></p>
        <ul>
          <li class="title">title</li>
          <li class="artist">artist</li>
        </ul>
      </div>
      <!-- END -->
      
      <!--繰り返し要素・曲 ※最初の5つ-->
      <div class="music-content">
        <p><img src="{{ asset('img/cheep-trick.jpg') }}" alt=""></p>
        <ul>
          <li class="title">title</li>
          <li class="artist">artist</li>
        </ul>
      </div>
      <!-- END -->
      
      <!--繰り返し要素・曲 ※最初の5つ-->
      <div class="music-content">
        <p><img src="{{ asset('img/cheep-trick.jpg') }}" alt=""></p>
        <ul>
          <li class="title">title</li>
          <li class="artist">artist</li>
        </ul>
      </div>
      <!-- END -->
      
      
      
    </div>
  </section>
</div>

<style type="text/css">
  #artist .artist-content .artist-img{
    background-image: url({{ asset('img/joan-jett.jpg') }});
  }
</style>

<script>
  let app = new Vue({
  el: '#app',
  data: function(){
    return {
      placeholder: 'Musicを検索',
      value: 'コレサワ'
    }
  },
  methods: {
    inputActive: function(){
//      this.placeholder = '';
    },
    inputSleep: function(){
//      this.placeholder = '';
    }
  }
})
</script>
@endsection

<!-- footer -->
@include('common.footer')


<style>
  #app .search{
    display: none;
  }
  #app h1{
    display: none;
  }
  #app .menu-trigger {
    top: 14px;
    left: 15px;
  }
  #app {
/*    position: absolute;*/
  }
  #wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    overflow-y: scroll;
/*    background-color: #f8a8c5;*/
    background-color: #404040;
  }
</style>
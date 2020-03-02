@extends('layout.layout')

<!-- head -->
@section('title', 'Search')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />
<link rel="stylesheet" href="{{asset('css/top-header.css')}}" />
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
  <section id="music">
    <ul class="contents-head">
    <li>曲</li>
      <li><button class="btn ajax-active">+20件</button></li>
    </ul>
    <div class="music-contents">
      
      <!--繰り返し要素・曲 ※最初の5つ-->
      @foreach ($musics as $music)
      <div class="music-content">
        <p><img src="{{ Storage::disk('s3')->url('image/music/' . $music->img_url) }}" alt=""></p>
        <ul>
        <li class="title">{{ $music->name }}</li>
        <li class="artist">{{ $music->artist()->first()->name }}</li>
        </ul>
      </div>
      @endforeach
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
      value: '{{ $genre }}'
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
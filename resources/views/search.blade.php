@extends('layout.layout')

<!-- head -->
@section('title', 'Search')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/top-header.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/search.css',$is_production)}}" />

<script src="{{ asset('js/search.js',$is_production) }}" defer></script>
<script src="{{ asset('js/hbg.js',$is_production) }}" defer></script>


@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="contents">
  @if($more == 'no' || $more == 'artist')
    <section id="artist">
      <ul class="contents-head">
        <li>アーティスト</li>
        @if($more == 'no')
          <li><a href="search/artist/{{ $req->search }}"><button class="btn ajax-active">More</button></a></li>
        @endif
      </ul>
      <div class="artist-contents">

      <!--繰り返し要素・アーティスト ※最初の4つ-->
      @foreach ($artists as $artist)
      <a href="search/artist_music/{{ $artist->id }}">
        <div class="artist-content">
          <div class="artist-img"><img src="{{ Storage::disk('s3')->url('artist/image/' . $artist->img_url) }}" alt=""></div>
        <h3>{{ $artist->name }}</h3>
        </div>
      </a>
      @endforeach
      <!-- END -->
      </div>
    </section>
  @endif

  @if($more == 'no' || $more == 'genre' || $more == 'music' || $more == 'genreMore' || $more == 'artist_music' || $more == 'campaign_music')
    <section id="music">
      <ul class="contents-head">
        <li>曲</li>
        @if($more == 'no')
          <li><a href="search/music/{{ $req->search }}"><button class="btn ajax-active">More</button></a></li>
        @endif
        @if($more == 'genre')
          <li><a href="more/{{ $genre_id }}"><button class="btn ajax-active">More</button></a></li>
        @endif
      </ul>
      <div class="music-contents">
        
        <!--繰り返し要素・曲 ※最初の5つ-->
        @foreach ($musics as $music)
        <a href="/detail/music/{{ $music->id }}">
          <div class="music-content">
            <p><img src="{{ Storage::disk('s3')->url('image/music/' . $music->img_url) }}" alt=""></p>
            <ul>
            <li class="title">{{ $music->name }}</li>
            <li class="artist">{{ $music->artist()->first()->name }}</li>
            </ul>
          </div>
        </a>
        @endforeach
        <!-- END -->    
      </div>
    </section>
  @endif
</div>
@php
  if ($more == 'no') {
    $value = $req->search;
  } 
  else if($more == 'genre' || $more == 'genreMore'){
    $value = $genre;
  } 
  else{
    $value = $name;
  }
@endphp
<style type="text/css">
  #artist .artist-content .artist-img{
    background-image: url({{ asset('img/joan-jett.jpg',$is_production) }});
  }
</style>

<script>
  let app = new Vue({
  el: '#app',
  data: function(){
    return {
      placeholder: 'Musicを検索',
      value: '{{ $value }}'
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
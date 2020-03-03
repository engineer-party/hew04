@extends('layout.layout')

<!-- head -->
@section('title', 'PlaylistMusics')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />
<link rel="stylesheet" href="{{asset('css/playlist-in.css')}}" />

<script src="{{ asset('js/library.js') }}" defer type="application/javascript"></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<section class="playlist-in">
 
  <div class="playlist-img">
     <img src="{{ asset('img/joan-jett.jpg') }}" alt="">
     <img src="{{ asset('img/joan-jett.jpg') }}" alt="">
     <img src="{{ asset('img/joan-jett.jpg') }}" alt="">
     <img src="{{ asset('img/joan-jett.jpg') }}" alt="">
  </div>
  
  <div class="playlist-value">
  
  <h2>Rock-HOT</h2>
  <div class="playlist-info">
    <div class="info">
      <p><img src="{{ asset('img/joan-jett.jpg') }}" alt=""></p>
      <ul>
        <li>プレイリスト</li>
        <li><span>20</span>曲</li>
      </ul>
    </div>
    <div class="info-btn">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <div id="play-lists">
<!--    <draggable tag="div" v-model="items" :options="{animation:300, handle:'.musicIcon'}">-->
<!--      <div class="music-content" v-for="item in items" :key="item">-->
      <div class="music-content">
        <p><img src="{{ asset('img/sex-pistols.jpg') }}" alt=""></p>
        <ul>
          <li class="title">Anarchy In THE U.K</li>
          <li class="artist">Sex Pistols・3:36</li>
        </ul>
      </div>
      
      <div class="music-content">
        <p><img src="{{ asset('img/sex-pistols.jpg') }}" alt=""></p>
        <ul>
          <li class="title">Anarchy In THE U.K</li>
          <li class="artist">Sex Pistols・3:36</li>
        </ul>
      </div>
      
      <div class="music-content">
        <p><img src="{{ asset('img/sex-pistols.jpg') }}" alt=""></p>
        <ul>
          <li class="title">Anarchy In THE U.K</li>
          <li class="artist">Sex Pistols・3:36</li>
        </ul>
      </div>
<!--    </draggable>-->
  </div>

  </div>
</section>
<script>
  /*
    let playlist = new Vue({
      el: '#play-lists',
      data: function() {
        return {
          items: [{
              title: 'Anarchy In The U.K',
              artist: 'sex pistols',
              time: '3:32'
            },
            {
              title: 'God Save The Queen',
              artist: 'sex pistols',
              time: '3:19'
            },
            {
              title: 'T.N.T',
              artist: 'AC/DC',
              time: '3:34'
            },
            {
              title: 'Hammer To Fall',
              artist: 'Queen',
              time: '3:40'
            },
            {
              title: 'Poison',
              artist: 'Alice Cooper',
              time: '4:30'
            }
          ]
        }
      }
    })
    */
</script>

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
    position: fixed;
    top: 0;
    left: 0;
    overflow-y: scroll;
  }

  #app #form {
    display: none;
  }

  #app {
    width: 100%;
    background-color: transparent;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 50;
  }

  #app .menu-trigger {
    top: 22px;
    left: 30px;
  }

  #app h1 {
    padding: 20px;
    padding-left: 65px;
    padding-bottom: 40px;
    color: white;
    font-size: 1.2em;
    letter-spacing: 2px;
  }

</style>
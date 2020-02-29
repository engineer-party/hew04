@extends('layout.layout')

<!-- head -->
@section('title', 'PlayList')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />
<link rel="stylesheet" href="{{asset('css/playlist.css')}}" />
<link rel="stylesheet" href="{{asset('css/music.css')}}" />
<link rel="stylesheet" href="{{asset('css/playlist-in.css')}}" />



<script src="{{ asset('js/library.js') }}" defer type="application/javascript"></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')

<div id="contents">
  <nav id="navber">
    <ul>
      <li v-for="item in links" :key="item.class"><a class="library-link" :class="{ active:item.active }" v-on:click='activetab(item.class)'>@{{ item.name }}</a></li>
    </ul>
  </nav>
  <transition name="bottom">
  <div class="playlists" v-if="activePL">
  @include('playlist')
  </div>
  </transition>
  <transition name="bottom">
  <div class="music" v-if="activeMusic">
  @include('music')
  </div>
  </transition>
  <p><img src="{{ asset('img/loading.gif') }}" alt="" class="loading"></p>
    <div class="playlist-in" :class="{activeplaylist:playlistInActive}">
      <div class="back" @click="playlistInActive = false">
        <div class="topLine line"></div>
        <div class="borderLine line"></div>
        <div class="bottomLine line"></div>
      </div>
    </div>
  </div>

<script>
let test = new Vue({
el: '#contents',
data: function () {
  return {
    links: [
      {
        class: 0,
        active: true,
        name: 'プレイリスト'
      },
      {
        class: 1,
        active: false,
        name: '曲'
      },
      {
        class: 2,
        active: false,
        name: 'アーティスト'
      }
          ],
    playlists: [
      {
        //name: プレイリスト名,img1.2.3.4:ランダムな画像4つ
        id:0,
        name: 'Rock-Hot',
        option: false,
        img1: "{{ asset('img/cheep-trick.jpg')}}",
        img2: "{{ asset('img/cheep-trick.jpg')}}",
        img3: "{{ asset('img/cheep-trick.jpg')}}",
        img4: "{{ asset('img/cheep-trick.jpg')}}",
      },
      {
        id:1,
        name: 'Rock-Hot',
        option: false,
        img1: "{{ asset('img/cheep-trick.jpg')}}",
        img2: "{{ asset('img/cheep-trick.jpg')}}",
        img3: "{{ asset('img/cheep-trick.jpg')}}",
        img4: "{{ asset('img/cheep-trick.jpg')}}",
      },
      {
        id:2,
        name: 'Rock-Hot',
        option: false,
        img1: "{{ asset('img/cheep-trick.jpg')}}",
        img2: "{{ asset('img/cheep-trick.jpg')}}",
        img3: "{{ asset('img/cheep-trick.jpg')}}",
        img4: "{{ asset('img/cheep-trick.jpg')}}",
      },
      {
        id:3,
        name: 'Rock-Hot',
        option: false, 
        img1: "{{ asset('img/cheep-trick.jpg')}}",
        img2: "{{ asset('img/cheep-trick.jpg')}}",
        img3: "{{ asset('img/cheep-trick.jpg')}}",
        img4: "{{ asset('img/cheep-trick.jpg')}}",
      },
    ],
    playlistInActive: false,
    activePL: true,
    activeMusic: false
  }
},
methods: {
  playlistActive: function (index) {
    this.playlists[index].option = true;
    this.playlists.splice();
  },
  activetab: function (index) {
    console.log(this.links[index].class);
    if (index == 0) {
      this.links[1].active = false;
      this.links[2].active = false;
      this.activeMusic = false;
      this.activePL = true;
    } else if (index == 1) {
      this.links[0].active = false;
      this.links[2].active = false;
      this.activePL = false;
      this.activeMusic = true;
    } else if (index == 2) {
      this.links[0].active = false;
      this.links[1].active = false;
    }
    this.links[index].active = true;

    this.links.splice();
  }
}
})


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
    background-color: #ff5757;
    position: fixed;
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
    padding-bottom: 40px;
    color: white;
    font-size: 1.2em;
    letter-spacing: 4px;
  }

  #navber {
    position: fixed;
    top: 80px;
    width: 100%;
    background-color: #ff5757;
    overflow-x: scroll;
    justify-content: space-around;
    z-index: 1;
    box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);
    /*    margin-bottom: -200px;*/
  }

  #navber::-webkit-scrollbar {
    /* Chrome, Safari 対応 */
    display: none;
  }

  #navber ul {
    display: flex;
    width: 400px;

  }

  #navber li {
    color: white;
    /*    background-color: aqua;*/
    /*    border: solid black 1px;*/
    text-align: center;
    font-size: 0.8em;
    width: calc(100% / 4);
  }

  .library-link {
    display: block;
    line-height: 40px;
    height: 40px;
    padding: 0;
    margin: 0;
    /*    border: solid black 1px;*/
    width: 100%;
    font-size: 0.9em;
    background-color: #ff5757;
    color: white;
    /*    left: 10px;*/
  }

  .box {
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    transition: transform 350ms cubic-bezier(0, 0, 0.2, 1) 0ms;
    overflow-y: scroll;
  }

  .activeobj1 {
    /*    background-color: aqua;*/
  }

  .activeobj2 {
    background-color: blueviolet;
  }

  .activeobj3 {
    background-color: chartreuse;
  }

  .activeobj4 {
    background-color: darkorange;
  }

  /*
  .contents {box
    width: 100%;
    height: 100vh;
    background-color: white;
    overflow-y: scroll;
    position: relative;
    left: 50%;
    transform: translate(-50%);
    z-index: 5;
  }
*/

  .contents::-webkit-scrollbar {
    /* Chrome, Safari 対応 */
    display: none;
  }

  .loading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    display: none;
    z-index: 0;
  }
  
  .info-btn{
    width: 20px;
    height: 50px;
/*    position: relative;*/
/*    top: -30px;*/
/*    left: 50%;*/
  }
.info-btn div{
  background-color: gray;
  margin: 0 auto;
}
  .playlists,
  .music {
    position: absolute;
    top: 135px;
    left: 0;
    width: 100%;
/*
  transition: opacity 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
  transform: translate(-100vw,0);
*/
}
  
  /* bottom */
.bottom-enter-active, .bottom-leave-active {
  transform: translate(0px, 0px);
  transition: transform 350ms cubic-bezier(0, 0, 0.2, 1) 0ms;
}

.bottom-enter, .bottom-leave-to {
  transform: translateX(0px) translateY(100vh);
}
/* end */


  /*----- addclass -----*/
  .active {
    border-bottom: solid white 3px;
  }

  .activeobj {
    transform: translate(0,0);
  }
</style>
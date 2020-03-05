@extends('layout.layout')

<!-- head -->
@section('title', 'PlayList')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />
<link rel="stylesheet" href="{{asset('css/playlist.css')}}" />
<link rel="stylesheet" href="{{asset('css/music.css')}}" />
<link rel="stylesheet" href="{{asset('css/audio.css')}}" />


<script src="{{ asset('js/audio.min.js') }}"></script>
<script src="{{ asset('js/library.js') }}" defer type="application/javascript"></script>
<!--<script src="{{ asset('js/test.js') }}" defer type="application/javascript"></script>-->
<script src="{{ asset('js/hbg.js') }}" defer></script>

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="contents">
  <form action="/library/add" method="POST" id="playlist-form">
    {{ csrf_field() }}
    <div class="add-playlist" @click="addPlaylist = true"></div>
    <transition name="fade">
      <div class="playlist-lists" v-if="playlistAdd">
        <ul class="playlist-lists-in">
          <li class="title">プレイリストに追加</li>
          <li v-for="item in playlists">
            <button type="submit" name="playlist_id" :value="item.id">@{{ item.name }}</button>
          </li>
          <li class="cansel" @click="addCansel">キャンセル</li>
        </ul>
      </div>
    </transition>
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
  </form>

  <p><img src="{{ asset('img/loading.gif') }}" alt="" class="loading"></p>
  <!--
  <div class="playlist-in" :class="{activeplaylist:playlistInActive}">
    <div class="back" @click="playlistInActive = false">
      <div class="topLine line"></div>
      <div class="borderLine line"></div>
      <div class="bottomLine line"></div>
    </div>
  </div>
  -->
  <div class="add-playlist-bg" v-if="addPlaylist" @click="addPlaylist = false"></div>
  <transition name="fade">
    <div id="add-playlist" v-if="addPlaylist">
      <div class="add-playlist-in">
        <h3>新しいプレイリスト</h3>
        <form action="/library/playlist" method="POST" id="playlist-form">
          <p><input type="text" name="playlist_name" placeholder="タイトル"></p>
          @if($errors)
            <p id="error">{{$errors->first('playlist_name')}}</p>
          @endif
          <ul>
            <li><button class="btn cancel-btn" type="button" @click="addPlaylist = false">キャンセル</button></li>
            <li><button class="btn add-btn" @click="addPlaylist = false">追加</button></li>
          </ul>
        </form>
      </div>
    </div>
  </transition>
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
      }
          ],
    playlists: [
      @foreach ($playlists as $playlist)
      {
        //name: プレイリスト名,img1.2.3.4:ランダムな画像4つ
        id:{{ $playlist->id }},
        name: '{{ $playlist->name }}',
        option: false,
        img1: "{{ $playlist->img1 }}",
        img2: "{{ $playlist->img2 }}",
        img3: "{{ $playlist->img3 }}",
        img4: "{{ $playlist->img4 }}",
      },
      @endforeach
    ],
    musics: [
      //id: 曲id, title: 曲タイトル, artist: アーティスト, img: 曲画像, time: 再生時間(分:秒)
      
      @foreach ($musics as $music)
      {
        option:false,
        id: {{ $music->id }},
        title: '{{ $music->name }}',
        artist: '{{ $music->artist()->first()->name }}',
        img: "{{ Storage::disk('s3')->url('image/music/' . $music->img_url) }}",
        time: '{{ substr($music->time, 0, 5) }}',
      },
      @endforeach
      
      /*
      {
        option:false,
        id: 12345,
        title: "I LOVE ROCK'N ROLL",
        artist: 'Joan Jett',
        img: "{{ asset('img/joan-jett.jpg') }}",
        time: '3:36',
      },
      */
    ],
    playlistInActive: false,
    activePL: true,
    activeMusic: false,
    addPlaylist: false,
    playlistAdd: false,
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
      this.activeMusic = false;
      this.activePL = true;
    } else if (index == 1) {
      this.links[0].active = false;
      this.activePL = false;
      this.activeMusic = true;
    }
    this.links[index].active = true;

    this.links.splice();
  },
  musicOption: function(index){
    console.log(index);
    this.musics[index].option = true;
    this.playlists.splice();
  },
  addCansel: function(){
    this.playlistAdd = false;
  }
},
mounted: function() {
  /*
  audiojs.events.ready(function() {
    var as = audiojs.createAll();
    console.log('clear');
  });
  */
  $('').on('click',function(){
    console.log('hey');
  })
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
  }
  .add-playlist {
    width: 36px;
    height: 36px;
    border-radius: 18px;
    position: fixed;
    top: 12px;
    right: 20px;
    z-index: 55;
/*    background-color: blueviolet;*/
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-image: url({{ asset('img/playlist-add.png') }});
  }
  #add-playlist {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 70%;
    height: auto;
    background-color: white;
    border-radius: 3px;
    z-index: 70;
  }
  #add-playlist h3{
    font-size: 1.2em;
    width: 100%;
    height: 50px;
    line-height: 50px;
/*    padding: 20px;*/
/*    background-color: aqua;*/
    margin-top: 20px;
    margin-bottom: 20px;
  }
  #add-playlist input{
    background: none;
    border: none;
    padding-left: 10px;
    border: none;
    border-radius: 0;
    outline: none;
    width: 100%;
    margin: 0 auto;
/*    margin-left: 20px;*/
    height: 50px;
    font-size: 1.0em;
    border-bottom: solid rgba(0,0,0,0.5) 2px;
    margin-bottom: 40px;
  }
  #add-playlist input:focus{
    border-bottom: solid #ff5757 2px;
  }
  #add-playlist ul{
    display: flex;
    border-radius: 0px;
    margin-bottom: 10px;
    justify-content: space-between;
  }
  #add-playlist li{
    width: 47%;
  }
  #add-playlist button{
    width: 100%;
    height: 40px;
    line-height: 20px;
    color: #ff5757;
    background-color: white;
  }
  #add-playlist .cancel-btn{
    
  }
  #add-playlist .add-btn{
  }
  .add-playlist-in{
    width: 85%;
    height: auto;
    margin: 0 auto;
  }
  .add-playlist-bg {
    width: 100%;
    height: 100vh;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 60;
    background-color: rgba(0,0,0,0.4);
  }
  .playlist-lists {
    position: absolute;
    height: 100vh;
    width: 100%;
/*    background-color: aqua;*/
    background: rgba(0,0,0,0.4);
    top: 0;
    left: 0;
    border-radius: 3px;
    overflow: hidden;
    z-index: 100;
  }
  
  .playlist-lists-in {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 60%;
    height: auto;
    margin: 0 auto;
    background-color: white;
    box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.2);
    border-radius: 3px;
    overflow: hidden;
  }
  .playlist-lists-in li{
    width: 100%;
    height: 50px;
    border-bottom: solid rgba(0,0,0,0.1) 1px;
  }
  .playlist-lists-in button{
    background: none;
    border: none;
    padding-left: 10px;
    border: none;
    border-radius: 0;
    outline: none;
    width: 100%;
    height: 50px;
    text-align: left;
    padding-left: 20px;
  }
  .playlist-lists-in .title{
    font-size: 1.2em;
    text-align: left;
    line-height: 60px;
    padding-left: 20px;
    height: 60px;
/*    padding-top: 20px;*/
  }
  .playlist-lists-in .cansel{
    line-height: 50px;
    padding-left: 20px;
    text-align: center;
    color: #ff5757;
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
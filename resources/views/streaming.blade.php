@extends('layout.layout')

<!-- head -->
@section('title', 'Hunt')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/playlist.css',$is_production)}}" />

<script src="{{ asset('js/hbg.js',$is_production) }}" defer></script>
@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="contents">
  <h2>配信するプレイリストを選択</h2>
<div id="playlist">
 <form>
  <!-- プレイリスト -->
  <label
   class="playlist-content"
   v-for="(item,index) in tests"
   for="stream">
   <div @click="streamPlaylist(index)">
    <div class="img">
      <img :src="item.img1" alt="">
      <img :src="item.img2" alt="">
      <img :src="item.img3" alt="">
      <img :src="item.img4" alt="">
    </div>
    <div class="text">
      <p class="title">@{{ item.name }}</p>
    </div>
    <input type="checkbox" id="stream" :value="item.name">
<!--    <button type="button"class="play-btn"></button>-->
    <div class="stream-form-bg" v-if="item.option" @click="item.option = false"></div>
  </div>
    <transition name="fade">
    <div class="stream-form" :class="index" v-if="item.option">
      <h3>プレイリストを配信します</h3>
      <p class="playlist-name">@{{ item.name }}</p>
      <ul>
        <li><button type="button" class="btn cancel" @click="item.option = false">Cancel</button></li>
        <li><button class="btn ok">Start</button></li>
      </ul>
    </div>
    </transition>
  </label>
  <!-- END -->
  
  
  </form>
</div>
</div>


<script>
let headOpen = false;
  
let streaming = new Vue({
  el: '#playlist',
  data: {
    tests: [
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
    ]
  },
  methods: {
    streamPlaylist: function(index){
      this.tests[index].option = true;
      this.tests.splice();
    },
    formClose: function(index){
    },
  }
})
</script>
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
    background-image: url({{ asset('img/hunt.png',$is_production) }});
  }
  #link-list li:nth-child(3)::before{
    background-image: url({{ asset('img/streaming-active.png',$is_production) }});
  }
  #link-list li:nth-child(4)::before{
    background-image: url({{ asset('img/playlist.png',$is_production) }});
  }
  #link-list li:nth-child(3) {
    background: rgba(0, 0, 0, 0.1);
  }

  #link-list li:nth-child(3) .link-title {
    color: #ff5757;
  }
  
#wrapper {
height: 100vh;
width: 100%;
position: fixed;
top: 0;
left: 0;
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
  width: 100%;
  height: 100vh;
  margin: 0 auto;
  background-color: #FFEBE0;
}
#contents h2{
  color: #ff5757;
  width: 100%;
  font-size: 1.0em;
  text-align: center;
  line-height: 70px;
}
  #stream {
    display: none;
  }
  .stream-form {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 65%;
    height: auto;
    background-color: white;
    border-radius: 3px;
    overflow: hidden;
  }
  .stream-form-bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0,0,0,0.3);
  }
  .stream-form ul{
    width: 100%;
    height: auto;
    display: flex;
    margin-top: 20px;
  }
  .stream-form h3{
    width: 100%;
    height: 60px;
    line-height: 60px;
    text-align: center;
    font-size: 0.9em;
    margin-bottom: 10px;
/*    color: #ff5757*/
  }
  .stream-form .playlist-name{
    width: 90%;
    background-color: #ff5757;
    border-radius: 3px;
    box-shadow: 0px 0px 5px rgba(0,0,0,0.4);
    color: white;
    margin: 0 auto;
    height: 50px;
    line-height: 50px;
    text-align: center;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
  }
  .stream-form .cancel,
  .stream-form .ok{
    width: 100%;
    height: 50px;
    line-height: 30px;
    border-radius: 0px;
    background: none;
  }
  .stream-form li{
    width: 100%;
    height: 50px;

  }
  .stream-form {
    
  }
</style>
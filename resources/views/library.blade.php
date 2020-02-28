@extends('layout.layout')

<!-- head -->
@section('title', 'PlayList')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />
<link rel="stylesheet" href="{{asset('css/playlist.css')}}" />
<link rel="stylesheet" href="{{asset('css/music.css')}}" />
<link rel="stylesheet" href="{{asset('css/playlist-in.css')}}" />



<script src="{{ asset('js/library.js') }}" defer></script>
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
      <li><a class="library-link ajax-action1" v-on:click='activetab=1' v-bind:class="[ activetab === 1 ? 'active' : '' ]">プレイリスト</a></li>
      <li><a class="library-link ajax-action2" v-on:click='activetab=2' v-bind:class="[ activetab === 2 ? 'active' : '' ]">曲</a></li>
      <li><a class="library-link ajax-action3" v-on:click='activetab=3' v-bind:class="[ activetab === 3 ? 'active' : '' ]">アーティスト</a></li>
      <li><a class="library-link ajax-action4" v-on:click='activetab=4' v-bind:class="[ activetab === 4 ? 'active' : '' ]">アルバム</a></li>
    </ul>
  </nav>

  <section class="activeobj1 box">
    <!-- ajax -->
  </section>

  <p><img src="{{ asset('img/loading.gif') }}" alt="" class="loading"></p>
  <div class="playlist-in">
    <button class="play-btn"></button>
    <div class="playlist-img">
      <img src="{{ asset('img/cheep-trick.jpg') }}" alt="">
      <img src="{{ asset('img/joan-jett.jpg') }}" alt="">
      <img src="{{ asset('img/plus.jpg') }}" alt="">
      <img src="{{ asset('img/sex-pistols.jpg') }}" alt="">
    </div>
    <div class="playlist-value">
      <div class="back">
        <div class="topLine line"></div>
        <div class="borderLine line"></div>
        <div class="bottomLine line"></div>
      </div>
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
        <draggable tag="div" v-model="items" :options="{animation:300, handle:'.musicIcon'}">
          <div class="music-content" v-for="item in items" :key="item">
            <div class="musicIcon"></div>
            <p><img src="{{ asset('img/sex-pistols.jpg') }}" alt=""></p>
            <ul>
              <li class="title">@{{ item.title }}</li>
              <li class="artist">@{{ item.artist }}・@{{ item.time }}</li>
            </ul>
          </div>
        </draggable>
      </div>
    </div>
  </div>
  <script>
    let playlist = new Vue({
      el: '#play-lists',
      data: function () {
        return {
          items: [
          {
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
    /*
    const Storage = window.VueStorage;
    Vue.use(Storage);
    let playlist = new Vue({
      el: '#play-lists',
      data: {
        items:[]
      },
      beforeMount: function () {
        if (Vue.ls.get('Value')) {
          // ブラウザストレージデータがある場合
          this.items = JSON.parse(Vue.ls.get('Value'));
        } else {
        this.items = [
          {
            title: 'Anarchy In The U.K',
            artist: 'sex pistols',
            time: '3:32'
          },
          {
            title: 'God Save The Queen',
            point: 'sex pistols',
            time: '3:19'
          },
          {
            title: 'T.N.T',
            point: 'AC/DC',
            time: '3:34'
          },
          {
            title: 'Hammer To Fall',
            point: 'Queen',
            time: '3:40'
          },
          {
            title: 'Poison',
            point: 'Alice Cooper',
            time: '4:30'
          }
        ];
      }
    },
    methods: {},
    computed: {
      getItems: {
        get: function () {
          return this.items;
        },
        set: function (value) {
          this.items = value;
        }
      }
    },
    watch: {
      items: function (value) {
        //itemsが更新される度にローカルストレージを更新
        Vue.ls.set('Value', JSON.stringify(value), 60 * 60 * 1000);
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
    padding-bottom: 40px;
    color: white;
    font-size: 1.2em;
    letter-spacing: 4px;
  }

  #navber {
    position: relative;
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

  /*----- addclass -----*/
  .active {
    border-bottom: solid white 3px;
  }

  .activeobj {
    transform: translate(-50%);
  }
</style>
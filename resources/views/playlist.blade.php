  <div id="playlist">
    <!-- プレイリスト -->
    <div class="playlist-content">
      <div class="img" @click="playlistInActive = true">
        <img src="{{ asset('img/cheep-trick.jpg') }}" alt="">
        <img src="{{ asset('img/joan-jett.jpg') }}" alt="">
        <img src="{{ asset('img/plus.jpg') }}" alt="">
        <img src="{{ asset('img/sex-pistols.jpg') }}" alt="">
      </div>
      <div class="text">
        <p class="title">Rock-Hot</p>
        <div class="info-btn" @click="playlistActive">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
      <button class="play-btn"></button>
      <div class="playlist-option" v-if="option">
        <ul>
          <li class="add-music"><button>曲を追加</button></li>
          <li class="del-playlist"><button>プレイリストを削除</button></li>
        </ul>
      </div>
    </div>
    <!-- END -->
    
<!--      <div class="playlist-in" v-bind:class='{activeplaylist:playlistActive}'></div>-->
    
  </div>
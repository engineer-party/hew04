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
    <div class="playlist-option-bg" v-if="option" @click="option = false"></div>
    <transition name="fade">
      <ul class="playlist-option" v-if="option">
        <li class="playlist-edit"><button>プレイリストを編集</button></li>
        <li class="del-playlist"><button>プレイリストを削除</button></li>
      </ul>
    </transition>
  </div>
  <!-- END -->
</div>
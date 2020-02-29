<div id="playlist">
  <!-- プレイリスト -->
  <div class="playlist-content" v-for="item in playlists" :key="item.id">
    <div class="img" @click="playlistInActive = true">
      <img :src="item.img1" alt="">
      <img :src="item.img2" alt="">
      <img :src="item.img3" alt="">
      <img :src="item.img4" alt="">
    </div>
    <div class="text">
      <p class="title">@{{ item.name }}</p>
      <div class="info-btn" @click="playlistActive(item.id)">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <button class="play-btn"></button>
    <div class="playlist-option-bg" v-if="item.option" @click="item.option = false"></div>
    <transition name="fade">
      <ul class="playlist-option item.id" v-if="item.option">
        <li class="playlist-edit"><button>プレイリストを編集</button></li>
        <li class="del-playlist"><button>プレイリストを削除</button></li>
      </ul>
    </transition>
  </div>
  <!-- END -->
</div>
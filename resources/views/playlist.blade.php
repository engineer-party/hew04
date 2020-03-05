<div id="playlist">
  <!-- プレイリスト -->
  <div class="playlist-content" v-for="(item,index) in playlists" :key="item.id">
    <a v-bind:href="`/playlist/${item.id}`">
      <div class="img" @click="playlistInActive = true">
        <img :src="item.img1" alt="">
        <img :src="item.img2" alt="">
        <img :src="item.img3" alt="">
        <img :src="item.img4" alt="">
      </div>
    </a>
    <div class="text">
      <p class="title">@{{ item.name }}</p>
      <div class="info-btn" @click="playlistActive(index)">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <button type="button"class="play-btn"></button>
    <div class="playlist-option-bg" v-if="item.option" @click="item.option = false"></div>
    <transition name="fade">
      <ul class="playlist-option" :class="index" v-if="item.option">
        <li class="name">@{{ item.name }}</li>
        <li class="playlist-edit"><button type="button">プレイリストを編集</button></li>
        <li class="del-playlist"><button type="button">プレイリストを削除</button></li>
      </ul>
    </transition>
  </div>
  <!-- END -->
</div>
<div id="music">
  <h2>すべての音楽を再生</h2>
  <!-- 曲 -->
  <div class="music-content" v-for="(item, index) in musics">
    <div class="music-option-bg" @click="item.option = false" v-if="item.option"></div>
    <div class="music-content-in">
      <p><img :src="item.img" alt=""></p>
      <ul>
        <li class="title">@{{ item.title }}</li>
        <li class="artist">@{{ item.artist }}<span class="time">・@{{item.time}}</span></li>
      </ul>
    </div>
    <div class="info-btn" @click="musicOption(index)">
      <div></div>
      <div></div>
      <div></div>
    </div>
    <transition name="fade">
    <div class="music-option" :class="index" v-if="item.option">
      <ul>
      <!--チェックボックス name: music に曲のidをvalueに入れてます-->
        <li><label for="music-check"><input type="checkbox" :value="item.id" name="music" id="music-check">プレイリストに追加</label></li>
        <li><button>アーティストに移動</button></li>
      </ul>
    </div>
    </transition>
  </div>
  <!-- END -->
</div>
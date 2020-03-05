<div id="music">
  <h2>すべての音楽を再生</h2>
  <!-- 曲 -->
  <div class="music-content" v-for="(item, index) in musics">
    <div class="music-option-bg" @click="item.option = false" v-if="item.option"></div>
    <div class="music-content-in">
      <p><img :src="item.img" alt=""></p>
      <div class="audio">
       <ul>
        <li class="title last"><a data-src="{{ asset('img/mp3/03.mp3') }}">@{{ item.title }}</a></li>
        <li class="artist">@{{ item.artist }}<span class="time">・@{{item.time}}</span></li>
      </ul>
      </div>
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
      <!--"プレイリストに追加" を押すとプレイリスト選択画面へ遷移-->
          <li><label for="music-check" @click="playlistAdd = true"><input type="checkbox" :value="item.id" name="music_id" id="music-check">プレイリストに追加</label></li>
        <li><button>アーティストに移動</button></li>
        <li><button>曲の詳細</button></li>
      </ul>
    </div>
    </transition>
  </div>
  <!-- END -->
</div>

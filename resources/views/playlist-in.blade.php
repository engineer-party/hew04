
<button class="play-btn"></button>
<div class="playlist-img">
  <img src="{{ asset('img/cheep-trick.jpg',$is_production) }}" alt="">
  <img src="{{ asset('img/joan-jett.jpg',$is_production) }}" alt="">
  <img src="{{ asset('img/plus.jpg',$is_production) }}" alt="">
  <img src="{{ asset('img/sex-pistols.jpg',$is_production) }}" alt="">
</div>
<div class="playlist-value">
  
  <h2>Rock-HOT</h2>
  <div class="playlist-info">
    <div class="info">
      <p><img src="{{ asset('img/joan-jett.jpg',$is_production) }}" alt=""></p>
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
        <p><img src="{{ asset('img/sex-pistols.jpg',$is_production) }}" alt=""></p>
        <ul>
          <li class="title">@{{ item.title }}</li>
          <li class="artist">@{{ item.artist }}・@{{ item.time }}</li>
        </ul>
      </div>
    </draggable>
  </div>

  <script>
    let playlist = new Vue({
      el: '#play-lists',
      data: function() {
        return {
          items: [{
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
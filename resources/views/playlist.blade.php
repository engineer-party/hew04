  <div id="playlist">
    <!-- プレイリスト -->
    <div class="playlist-content">
      <div class="img">
        <img src="{{ asset('img/cheep-trick.jpg') }}" alt="">
        <img src="{{ asset('img/joan-jett.jpg') }}" alt="">
        <img src="{{ asset('img/plus.jpg') }}" alt="">
        <img src="{{ asset('img/sex-pistols.jpg') }}" alt="">
      </div>
      <div class="text">
        <p class="title">Rock-Hot</p>
      </div>
      <button class="play-btn"></button>
    </div>
    <!-- END -->

    <!-- プレイリスト -->
    <a class="playlist-content">
      <div class="img">
        <img src="{{ asset('img/cheep-trick.jpg') }}" alt="">
        <img src="{{ asset('img/joan-jett.jpg') }}" alt="">
        <img src="{{ asset('img/plus.jpg') }}" alt="">
        <img src="{{ asset('img/sex-pistols.jpg') }}" alt="">
      </div>
      <p class="title">Rock-Hot</p>
      <button class="play-btn"></button>
    </a>
    <!-- END -->

    <!-- プレイリスト -->
    <a class="playlist-content">
      <div class="img">
        <img src="{{ asset('img/cheep-trick.jpg') }}" alt="">
        <img src="{{ asset('img/joan-jett.jpg') }}" alt="">
        <img src="{{ asset('img/plus.jpg') }}" alt="">
        <img src="{{ asset('img/sex-pistols.jpg') }}" alt="">
      </div>
      <p class="title">Rock-Hot</p>
      <button class="play-btn"></button>
    </a>
    <!-- END -->
    
<!--      <div class="playlist-in" v-bind:class='{activeplaylist:playlistActive}'></div>-->
    
  </div>


  <script>
    /*
    let playlist = new Vue({
      el: '#playlist',
      data: function() {
        return {
          playlistActive: false
        }
      }
    })
    */
    
    $('.playlist-content').click(function(){
      $('.playlist-in').addClass('activeplaylist');
    });
    
    
  </script>
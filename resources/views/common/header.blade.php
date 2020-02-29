@section('header')
<header>
  <div id="app">
    <h1>ホーム</h1>
    <nav>
      <div class="menu-trigger" href="#" @click="inputSleep">
        <div class="topLine line"></div>
        <div class="borderLine line"></div>
        <div class="bottomLine line"></div>
      </div>
    </nav>
    <p><input type="text" id="form" @click="inputActive" :placeholder="placeholder" :value='value'></p>
    <div class="search">
      <div class="category-link">
        <button class="btn category">カテゴリ</button>
        <button class="btn category"></button>
        <button class="btn category"></button>
        <button class="btn category"></button>
        <button class="btn category"></button>
        <button class="btn category"></button>
        <button class="btn category"></button>
        <button class="btn category"></button>
        <button class="btn category"></button>
        <button class="btn category"></button>
        <button class="btn category"></button>
        <button class="btn category"></button>
      </div>
    </div>

    <div id="link">
      <article id="link-in">
        <a id="account" type="button" href="{{ action('MyPageController@index') }}">
          <ul>
            <li><img src="" alt=""></li>
            <li>Cookie Man</li>
          </ul>
        </a>
        <section id="link-list">
          <ul>
            <li><a href="{{ action('TopController@index') }}"><span class="link-title">ホーム</span></a></li>
            <li><a href="{{ action('HuntController@index') }}"><span class="link-title">ハント</span></a></li>
            <li><a><span class="link-title">配信</span></a></li>
            <li><a href="{{ action('LibraryController@index') }}"><span class="link-title">音楽ライブラリ</span></a></li>
          </ul>
        </section>
        <section id="point">
          <ul>
            <li><a href="{{ action('PointController@index') }}">ポイント購入</a></li>
            <li><span class="point-icon">P</span>99999</li>
          </ul>
        </section>
        <section id="login_btn">
          @if(Auth::check())
          <!-- ログインしている場合 -->
          <a href="{{ action('AuthController@logout') }}"><button type="button">ログアウト</button></a>
          <!--      <a href="{{ action('MyPageController@index') }}"><button type="button">MyPage</button></a>-->
          @else
          @endif
        </section>
      </article>
    </div>
  </div>

</header>

<style type="text/css">
  
</style>


@endsection
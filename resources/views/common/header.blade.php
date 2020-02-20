@section('header')
<header>
<div id="app">
  <h1>ホーム</h1>
  <nav>
    <a class="menu-trigger" href="#" @click="inputSleep">
      <div class="topLine line"></div>
      <div class="borderLine line"></div>
      <div class="bottomLine line"></div>
    </a>
  </nav>
  <p><input type="text" class="form" @click="inputActive" :placeholder="placeholder"></p>
  <div id="link">
    <article id="link-in">
      <section id="account">
        <ul>
          <li><img src="" alt=""></li>
          <li>Cookie Man</li>
        </ul>
      </section>
      <section id="link-list">
        <ul>
          <li><span></span>ホーム</li>
          <li><span></span>ハント</li>
          <li><span></span>配信</li>
          <li><span></span>音楽ライブラリ</li>
        </ul>
      </section>
      <section id="login_btn">
      @if(Auth::check())
      <!-- ログインしている場合 -->
      <a href="{{ action('AuthController@logout') }}"><button type="button">ログアウト</button></a>
<!--      <a href="{{ action('MyPageController@index') }}"><button type="button">MyPage</button></a>-->
      @else
      <a href="{{ action('AuthController@signup') }}"><button type="button" class="btn btn-danger">新規会員</button></a>
      <a href="{{ action('AuthController@login') }}"><button type="button" class="btn btn-outline-primary">ログイン</button></a>
      @endif
      </section>
    </article>
  </div>
</div>

</header>



@endsection

@section('header')
<header>
<div id="app">
  <nav>
    <a class="menu-trigger" href="#" @click="inputSleep">
      <div class="topLine line"></div>
      <div class="borderLine line"></div>
      <div class="bottomLine line"></div>
    </a>
  </nav>
  <p><input type="text" class="form" @click="inputActive" :placeholder="placeholder"></p>
  <div id="link">
    <div id="link-in">
      
    </div>
  </div>
</div>
<div id="login_btn">
  @if(Auth::check())
  </- ログインしている場合 -/>
    <a href="{{ action('AuthController@logout') }}"><button type="button" class="btn btn-danger">ログアウト</button></a>
    <a href="{{ action('MyPageController@index') }}"><button type="button" class="btn btn-primary">MyPage</button></a>
  @else
    <a href="{{ action('AuthController@signup') }}"><button type="button" class="btn btn-danger">新規会員</button></a>
    <a href="{{ action('AuthController@login') }}"><button type="button" class="btn btn-outline-primary">ログイン</button></a>
  @endif
</div>
</header>



@endsection

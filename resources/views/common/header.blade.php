@section('header')
<header>
ヘッダー
<div id="login_btn">
  @if(Auth::check())
  </- ログインしている場合 -/>
    <a href="{{ action('AuthController@logout') }}"><button type="button" class="btn btn-danger">ログアウト</button></a>
  @else
    <a href="{{ action('AuthController@signup') }}"><button type="button" class="btn btn-danger">新規会員</button></a>
    <a href="{{ action('AuthController@login') }}"><button type="button" class="btn btn-outline-primary">ログイン</button></a>
  @endif
</div>
</header>
@endsection

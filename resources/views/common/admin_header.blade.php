@section('admin_header')
<header>
<h1>管理者ヘッダー</h1>
<a href="{{ action('AuthController@logout') }}"><button type="button">ログアウト</button></a>
</header>
@endsection

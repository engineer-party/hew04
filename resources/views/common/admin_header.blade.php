@section('admin_header')
<header class="header black-bg">
  <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
  </div>
  <!--logo start-->
  <a href="{{ action('Admin\AdminController@index') }}" class="logo"><b>HUNTING<span>MUSIC</span></b></a>
  <!--logo end-->
  <!--logout start-->
  <div class="top-menu">
    <ul class="nav pull-right top-menu">
      <li><a class="logout" href="{{ action('AuthController@logout') }}">ログアウト</a></li>
    </ul>
  </div>
  <!--logout end-->
</header>
<aside>
  <div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <li class="mt">
        <a href="{{ action('Admin\AdminController@index') }}">
          <i class="fa fa-dashboard"></i>
          <span>ダッシュボード</span>
        </a>
      </li>
      <li class="mt">
        <a href="{{ action('Admin\MapController@index') }}">
          <i class="fa fa-desktop"></i>
          <span>ハントMAP</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-tasks"></i>
          <span>商品</span>
          </a>
        <ul class="sub">
          <li><a href="{{ action('Admin\MusicUploadController@index') }}">アップロード
          </a></li>
          <li><a href="{{ action('Admin\SalesController@index') }}">売上</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-calendar"></i>
          <span>キャンペーン</span>
          </a>
        <ul class="sub">
          <li><a href="{{ action('Admin\PriceController@index') }}">価格設定</a></li>
          <li><a href="{{ action('Admin\CollaborationController@index') }}">コラボレーション</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-th"></i>
          <span>ユーザー管理</span>
          </a>
        <ul class="sub">
          <li><a href="{{ action('Admin\ManagementController@index') }}">ユーザー一覧</a></li>
          <li><a href="{{ action('Admin\ReportController@index') }}">通報管理</a></li>
          <li><a href="{{ action('Admin\SuspensionController@index') }}">停止アカウント管理</a></li>
          <li><a href="{{ action('Admin\InformationController@index') }}">お知らせ</a></li>
        </ul>
      </li>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
@endsection

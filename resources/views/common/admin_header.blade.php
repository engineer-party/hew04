@section('admin_header')
<header class="header black-bg">
  <!--logo start-->
  <a href="{{ action('Admin\AdminController@index') }}" class="logo"><b>HUNTING<span>MUSIC</span></b></a>
  <!--logo end-->
  <!--logout start-->
  <div class="top-menu">
    <ul class="nav pull-right top-menu align-middle">
      <li><a class="logout" href="{{ action('AuthController@logout') }}">Logout</a></li>
    </ul>
  </div>
  <!--logout end-->
</header>
<aside>
  <div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <li class="mt">
        <a class="active" href="{{ action('Admin\AdminController@index') }}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
          </a>
      </li>
      <li class="mt">
        <a href="">
          <i class="fa fa-desktop"></i>
          <span>Hunt Map</span>
          </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-tasks"></i>
          <span>Product</span>
          </a>
        <ul class="sub">
          <li><a href="">Artists</a></li>
          <li><a href="">Musics</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-tasks"></i>
          <span>Campaign</span>
          </a>
        <ul class="sub">
          <li><a href="">Price</a></li>
          <li><a href="">Collaboration</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-th"></i>
          <span>Users Management</span>
          </a>
        <ul class="sub">
          <li><a href="">Management</a></li>
          <li><a href="">Reports</a></li>
        </ul>
      </li>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
@endsection

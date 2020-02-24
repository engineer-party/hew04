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
        <a href="{{ action('Admin\AdminController@index') }}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="mt">
        <a href="{{ action('Admin\MapController@index') }}">
          <i class="fa fa-desktop"></i>
          <span>Hunt Map</span>
        </a>
      </li>
      <li class="mt">
        <a href="{{ action('Admin\MusicUploadController@index') }}">
          <i class="fa fa-tasks"></i>
          <span>Product</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-calendar"></i>
          <span>Campaign</span>
          </a>
        <ul class="sub">
          <li><a href="{{ action('Admin\PriceController@index') }}"">Price</a></li>
          <li><a href="{{ action('Admin\CollaborationController@index') }}"">Collaboration</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-th"></i>
          <span>Users Management</span>
          </a>
        <ul class="sub">
          <li><a href="{{ action('Admin\ManagementController@index') }}"">Management</a></li>
          <li><a href="{{ action('Admin\ReportController@index') }}"">Reports</a></li>
          <li><a href="{{ action('Admin\SuspensionController@index') }}"">Suspensions</a></li>
        </ul>
      </li>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
@endsection

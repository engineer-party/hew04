@section('admin_head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Dashboard">
<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<title>Hunc_admin-@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
<!-- Bootstrap -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!--external css-->
<link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('css/admin/zabuto_calendar.css') }}" rel="stylesheet">
<link href="{{ asset('lib/gritter/css/jquery.gritter.css') }}" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/admin/style-responsive.css') }}" rel="stylesheet">
<script src="{{ asset('lib/chart-master/Chart.js') }}"></script>


@yield('style')
@endsection
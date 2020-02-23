<!DOCTYPE html>
<html lang="ja">

<head>
    @yield('admin_head')
</head>

<body>
    <div id="wrapper">
        <h1>管理者</h1>
        @yield('admin_header')
        @yield('content')
        @yield('admin_footer')
        <!-- JavaScript -->
        <script src="{{ asset('js/app.js') }}"></script>
    </div>
</body>

</html>
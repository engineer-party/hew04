<!DOCTYPE html>
<html lang="ja">

<head>
    @yield('head')
</head>

<body>
    <div id="wrapper" style="margin-bottom:200px">
        @yield('header')
        @yield('content')
        @yield('footer')
        <!-- JavaScript -->
        <script src="{{ asset('js/app.js',$is_production) }}"></script>
    </div>
</body>

</html>
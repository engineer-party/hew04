<!DOCTYPE html>
<html lang="ja">

<head>
    @yield('head')
</head>

<body>
    <div id="wrapper">
        @yield('header')
        @yield('content')
        @yield('footer')
        <!-- JavaScript -->
        <script src="{{ asset('js/app.js') }}"></script>
    </div>
</body>

</html>
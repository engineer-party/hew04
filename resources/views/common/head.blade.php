@section('head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Hunc-@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<!-- Bootstrap -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- CSS -->
<link href="{{ asset('css/reset.css') }}" rel="stylesheet">
<!--Vue-->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!--hammer.js-->
<script src="{{ asset('js/hammer.min.js') }}"></script>
<script src="{{ asset('js/jquery.hammer.js') }}"></script>

<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
<script src="https://unpkg.com/vue-ls"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.20.0/vuedraggable.umd.min.js"></script>
-->

@yield('style')
@endsection
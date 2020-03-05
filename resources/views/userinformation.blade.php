@extends('layout.layout')

<!-- head -->
@section('title', 'information')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css',$is_production)}}" />

<script src="{{ asset('js/userinformation.js',$is_production) }}" defer></script>
<script src="{{ asset('js/hbg.js',$is_production) }}" defer></script>

<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/css/uikit.min.css" />
<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/js/uikit-icons.min.js"></script>

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="message">
    <h2 class="uk-text-center uk-text-small uk-text-danger">お知らせ</h2>
    <ul uk-accordion class="uk-list uk-list-striped uk-list-large">
        @foreach($data as $message)
        <li>
          <a href='#' class="uk-accordion-title">{{$message->title}}</a>
          <div class="uk-accordion-content uk-text-small">{!!nl2br(str_replace('\r\n',"\r\n",$message->content))!!}</div>
        </li>
        @endforeach
    </ul>
</div>
@endsection

<!-- footer -->
@include('common.footer')
{{--header--}}


<style type="text/css">

  #link-list li:nth-child(4) {
/*    background: rgba(0, 0, 0, 0.1);*/
  }

  #link-list li:nth-child(4) .link-title {
/*    color: #ff5757;*/
  }

  #link-list li:nth-child(1)::before {
    background-image: url({{ asset('img/home.png',$is_production)}});
  }
  
  #link-list li:nth-child(2)::before {
    background-image: url({{ asset('img/hunt.png',$is_production)}});
  }
  
  #link-list li:nth-child(3)::before {
    background-image: url({{ asset('img/streaming.png',$is_production)}});
  }
  
  #link-list li:nth-child(4)::before {
    background-image: url({{ asset('img/playlist.png',$is_production)}});
  }
  
* {
    margin: 0;
    padding: 0;
  }
  #form{
    display:none;
  }
  #wrapper {
    position: fixed;
    width: 100%;
    height: 100vh;
    background-color: #FFEBE0;
  }
  #app #form {
    display: none;
  }
  #app .search {
    display: none;
  }
  #app {
    width: 100%;
    background-color: #ff5757;
  }
  #app .menu-trigger{
    top: 22px;
    left: 30px;
  }
  #app h1{
    padding: 20px;
    padding-left: 65px;
    padding-bottom: 40px;
    color: white;
    font-size: 1.2em;
    letter-spacing: 4px;
  }
  ol, ul {
     padding-left: 0px!important;
  }
  address, dl, fieldset, figure, ol, p, pre, ul {
/*     margin: 0px!important;*/
  }
  </style>
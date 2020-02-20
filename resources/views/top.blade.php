@extends('layout.layout')

<!-- head -->
@section('title', 'Top')
@section('style')
<link rel="stylesheet" href="{{asset('css/top.css')}}" />
<link rel="stylesheet" href="{{asset('css/top-header.css')}}" />
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />

<script src="{{ asset('js/top.js') }}" defer></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<!--
  <transition :name="transition">
    <section id="search" v-if="searchOpen">
     <!--
      <div id="app-search" v-if="searchOpen">
        <ul>
          <li v-for="item in items"><span>Logo</span>@{{ item.message }}</li>
        </ul>
      </div>
    </section>
  </transition>
-->
@endsection

<!-- footer -->
@include('common.footer')

<style type="text/css">
  * {
    padding: 0;
    margin: 0;
    text-decoration: none;
    list-style-type: none;
  }
  #app h1{
    display: none;
  }
  #app .menu-trigger {
    top: 14px;
    left: 15px;
  }

/*-----transition-----*/
  /* top */
  .top-enter-active, .top-leave-active {
    transform: translate(0px, 0px);
    transition: transform 350ms cubic-bezier(0, 0, 0.2, 1) 0ms;
  }

  .top-enter, .top-leave-to {
    transform: translateY(-100vh) translateY(0px);
  }
    
  /* fade */
  .fade-enter-active, .fade-leave-active {
    will-change: opacity;
    transition: opacity 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
  }
  .fade-enter, .fade-leave-to {
    opacity: 0
  }
  /* end */
  
    
  </style>

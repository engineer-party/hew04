@extends('layout.layout')

<!-- head -->
@section('title', 'Report')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/report.css',$is_production)}}" />

<script src="{{ asset('js/hbg.js',$is_production) }}" defer></script>

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
<div id="contents">
<h1 id="title">通報フォーム</h1>
@if(session('message'))
    <div class="alert alert-success mt-4" role="alert"><strong>{{ session('message') }}</strong></div>
@endif
<form action="/report/store" method="POST" id="report-form">
    {{ csrf_field() }}

    @if($errors)
    <p id="error">{{$errors->first('id')}}</p>
    @endif
    <label>通報ユーザーID</label>
    <p><input type="tel" name="id" value="{{ empty($user_id) ? old('id') :$user_id }}" class="form-control" placeholder="通報するユーザーのID"></p>

    @if($errors)
        <p id="error">{{$errors->first('category')}}</p>
    @endif
    <label>通報の分類</label>
    <p>
        <select name="category">
            <option value="">-</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if(old('category')==$category->id) selected  @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </p>

    <label>詳細</label>
    <p><textarea name="detail" rows="6" placeholder="詳細な説明（任意）例）位置情報を不正取得している。">{{ old('detail') }}</textarea></p>

    <a href=""><button type="submit" class="btn btn-danger">通報する</button></a>
</form>
</div>
<script>
  let headOpen = false;
</script>
@endsection

<!-- footer -->
@include('common.footer')

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
  
  #app .search{
    display: none;
  }
  
  * {
    margin: 0;
    padding: 0;
  }

  #wrapper {
    width: 100%;
    height: 100vh;
    background-color: #FFEBE0;
    position: fixed;
    top: 0;
    left: 0;
    overflow-y: scroll;
  }

  #app #form {
    display: none;
  }

  #app {
    width: 100%;
    background-color: #ff5757;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 50;
  }

  #app .menu-trigger {
    top: 22px;
    left: 30px;
  }

  #app h1 {
    padding: 20px;
    padding-left: 65px;
    padding-bottom: 20px;
    color: white;
    font-size: 1.2em;
    letter-spacing: 2px;
  }
  #contents {
    width: 100%;
    height: 100vh;
    display: flex;
    top: 0;
    left: 0;
    overflow-y: scroll;
    padding-top: 100px;
  }
</style>

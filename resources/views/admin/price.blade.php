@extends('layout.admin')

<!-- head -->
@section('title', 'Price')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}" /> -->

@endsection
@include('common.admin_head')
<!-- header -->
@include('common.admin_header')

<!-- content -->
@section('content')
<h3><i class="fa fa-angle-right"></i> 価格設定</h3>
@if(session('message'))
  <div class="alert alert-success mt-4" role="alert"><strong>{{ session('message') }}</strong></div>
@endif
<div class="row mt">
  <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-panel">
      <h4 class="title">アーティスト名</h4>
      <div id="message"></div>
      <form class="contact-form php-mail-form" role="form" action="price/artist" method="POST">
        <div class="form-group">
          <select name="artist" class="form-control">
            <option value="">アーティスト名選択</option>
            @foreach ($artists as $artist)
            <option value="{{ $artist->id }}" @if(old('artist')==$artist->id) selected  @endif>{{ '#' . $artist->id . '　' . $artist->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <input type="num" name="price" class="form-control" id="price" value="{{ old ('price') }}" placeholder="値引額" >
          @if($errors)
          <p class="help-block">{{$errors->first('price')}}</p>
          @endif
        </div>
        <div class="form-group">
          <select name="period" class="form-control">
            <option value="">アーティスト名選択</option>
            <option value="5d">5日</option>
            <option value="7d">7日</option>
            <option value="10d">10日</option>
            <option value="30d">30日</option>
            <option value="1m">実演用 - 1分</option>
            <option value="3m">実演用 - 3分</option>
          </select>
        </div>

        <div class="form-send">
          <button type="submit" class="btn btn-large btn-primary">変更する</button>
        </div>

      </form>
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-panel">
      <h4 class="title">楽曲名</h4>
      <div id="message"></div>
      <form class="contact-form php-mail-form" role="form" action="price/music" method="POST">
        <div class="form-group">
          <select name="music" class="form-control">
            <option value="">楽曲名選択</option>
            @foreach ($musics as $music)
            <option value="{{ $music->id }}" @if(old('music')==$music->id) selected  @endif>{{ '#' . $music->id . '　' . $music->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <input type="num" name="price" class="form-control" id="price" value="{{ old ('price') }}" placeholder="値引額" >
          @if($errors)
          <p class="help-block">{{$errors->first('price')}}</p>
          @endif
        </div>
        <div class="form-group">
          <select name="period" class="form-control">
            <option value="">キャンペーン期間選択</option>
            <option value="5d">5日</option>
            <option value="7d">7日</option>
            <option value="10d">10日</option>
            <option value="30d">30日</option>
            <option value="1m">実演用 - 1分</option>
            <option value="3m">実演用 - 3分</option>
          </select>
        </div>

        <div class="form-send">
          <button type="submit" class="btn btn-large btn-primary">変更する</button>
        </div>

      </form>
    </div>
  </div>
</div>
<!-- /row -->
@endsection

<!-- footer -->
@include('common.admin_footer')
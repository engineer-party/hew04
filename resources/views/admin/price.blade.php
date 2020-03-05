@extends('layout.admin')

<!-- head -->
@section('title', 'Price')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css',$is_production)}}" /> -->

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
<div id="app" class="row mt">
  <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-panel">
      <h4 class="title">アーティスト名</h4>
      <div id="message"></div>
      <form class="contact-form php-mail-form" role="form" action="price/artist" method="POST">
        <div class="form-group">
          <select name="artist" class="form-control">
            <option value="">アーティスト名選択</option>
            @foreach ($artists as $artist)
            <option value="{{ $artist->id }}" @if(old('artist')==$artist->id || session('artist_id') == $artist->id) selected  @endif>
              {{ '#' . $artist->id . '　' . $artist->name }}
            </option>
            @endforeach
          </select>
          @if($errors)
          <p class="help-block">{{$errors->first('artist')}}</p>
          @endif
        </div>
        <div class="form-group">
          <input type="name" name="name_artist" class="form-control" id="name_artist" value="{{ old ('name_artist') }}" placeholder="キャンペーン名" >
          @if($errors)
          <p class="help-block">{{$errors->first('name_artist')}}</p>
          @endif
        </div>
        <div class="form-group">
          <textarea class="form-control" name="content_artist" id="content" placeholder="キャンペーン説明" rows="5">{{ old('content_artist') }}</textarea>
          @if($errors)
          <p class="help-block">{{$errors->first('content_artist')}}</p>
          @endif
        </div>
        <div class="form-group">
          <select name="artist_discount" class="form-control">
            <option value="">割引率選択</option>
            @foreach ($pars as $par)
          <option value="{{ $par }}" @if(old('artist_discount')==$par) selected  @endif>{{ $par }}%</option>
            @endforeach
          </select>
          @if($errors)
          <p class="help-block">{{$errors->first('artist_discount')}}</p>
          @endif
        </div>
        <div class="form-group">
          <select name="artist_period" class="form-control">
            <option value="">キャンペーン期間選択</option>
            <option value="5d" @if(old('artist_period')=='5d') selected  @endif>5日</option>
            <option value="7d" @if(old('artist_period')=='7d') selected  @endif>7日</option>
            <option value="10d" @if(old('artist_period')=='10d') selected  @endif>10日</option>
            <option value="30d" @if(old('artist_period')=='30d') selected  @endif>30日</option>
            <option value="1m" @if(old('artist_period')=='1m') selected  @endif>実演用 - 1分</option>
            <option value="3m" @if(old('artist_period')=='3m') selected  @endif>実演用 - 3分</option>
          </select>
          @if($errors)
          <p class="help-block">{{$errors->first('artist_period')}}</p>
          @endif
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
          <select id="0" class="custom-select" name="musics[]" @change="selectChange">
            <option value="0">楽曲名選択</option>
            <option value="{{ 'all' }}" @if(old('music')=='all') selected  @endif>#ALL　全ての楽曲</option>
            @foreach($musics as $music)
            <option value="{{ $music->id }}" @if(old('music')==$music->id || session('music_id') == $music->id) selected  @endif>
              {{ '#' . $music->id . '　' . $music->name }}
            </option>
            @endforeach
          </select>
          <div v-for="(select, index) in selects">
            <div class="form-group mt-3">
              <select v-bind:id="index+1" class="custom-select" name="musics[]" @change="selectChange">
                <option value="0">選択してください</option>
                @foreach($musics as $music)
                <option value="{{ $music->id }}" @if(old('music')==$music->id || session('music_id') == $music->id) selected  @endif>
                  {{ '#' . $music->id . '　' . $music->name }}
                </option>
                @endforeach
              </select>
            </div>
          </div>
          @if($errors)
          <p class="help-block">{{$errors->first('music')}}</p>
          @endif
        </div>
        <div class="form-group">
          <input type="name" name="name_music" class="form-control" id="name_music" value="{{ old ('name_music') }}" placeholder="キャンペーン名" >
          @if($errors)
          <p class="help-block">{{$errors->first('name_music')}}</p>
          @endif
        </div>
        <div class="form-group">
          <textarea class="form-control" name="content_music" id="content" placeholder="キャンペーン説明" rows="5">{{ old('content_music') }}</textarea>
          @if($errors)
          <p class="help-block">{{$errors->first('content_music')}}</p>
          @endif
        </div>
        <div class="form-group">
          <select name="music_discount" class="form-control">
            <option value="">割引率選択</option>
            @foreach ($pars as $par)
          <option value="{{ $par }}" @if(old('music_discount')==$par) selected  @endif>{{ $par }}%</option>
            @endforeach
          </select>
          @if($errors)
          <p class="help-block">{{$errors->first('music_discount')}}</p>
          @endif
        </div>
        <div class="form-group">
          <select name="music_period" class="form-control">
            <option value="">キャンペーン期間選択</option>
            <option value="5d" @if(old('music_period')=='5d') selected  @endif>5日</option>
            <option value="7d" @if(old('music_period')=='7d') selected  @endif>7日</option>
            <option value="10d" @if(old('music_period')=='10d') selected  @endif>10日</option>
            <option value="30d" @if(old('music_period')=='30d') selected  @endif>30日</option>
            <option value="1m" @if(old('music_period')=='1m') selected  @endif>実演用 - 1分</option>
            <option value="3m" @if(old('music_period')=='3m') selected  @endif>実演用 - 3分</option>
          </select>
          @if($errors)
          <p class="help-block">{{$errors->first('music_period')}}</p>
          @endif
        </div>

        <div class="form-send">
          <button type="submit" class="btn btn-large btn-primary">変更する</button>
        </div>

      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  new Vue({
    el: '#app',
    data: {
      selects:[],
    },
    methods: {
      selectChange(e){
        if(!this.selects.some(item => item === e.target.value) && e.target.value !== "0" && e.target.value !== "all"){
          this.selects.splice(e.target.id,1,e.target.value);
        }
      }
    }
  });
</script>
<!-- /row -->
@endsection

<!-- footer -->
@include('common.admin_footer')
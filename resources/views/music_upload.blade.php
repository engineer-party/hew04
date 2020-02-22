@extends('layout.layout')

<!-- head -->
@section('title', 'Admin')
@section('style')

@endsection
@include('common.head')

<!-- header -->

<!-- content -->
@section('content')
<div class="container">
  <h1 class="mb-2">楽曲登録</h1>
  <form method="post" action="{{ url('music_upload/music_store') }}">
    <div class="form-group">
      <label>アーティスト</label>
      <select class="custom-select" name="artist">
        @foreach($artists as $artist)
        <option value="{{ $artist->id }}">{{ $artist->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>ジャンル</label>
      <select class="custom-select" name="genre">
        @foreach($genres as $genre)
        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>曲名</label>
      <input class="form-control" type="text" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
      <label>価格</label>
      <input class="form-control" type="number" name="price" value="{{ old('price') }}">
    </div>
    <div class="form-group">
      <label>発売日</label>
      <input class="form-control" type="date" name="day" value="{{ old('day') }}">
    </div>
    <button class="btn btn-primary" type="submit">登録</button>
  </form>

  <h1 class="mb-2 mt-5">ジャンル登録</h1>
  <form method="post" action="{{ url('music_upload/genre_store') }}">
    <div class="form-group">
      <label>ジャンル名</label>
      <input class="form-control" type="text" name="name" value="{{ old('name') }}">
    </div>
    <button class="btn btn-primary" type="submit">登録</button>
  </form>

  <h1 class="mb-2 mt-5">アーティスト登録</h1>
  <form class="mb-2" method="post" action="{{ url('music_upload/artist_store') }}">
    <div class="form-group">
      <label>ジャンル</label>
      <select class="custom-select" name="genre">
        @foreach($genres as $genre)
        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>アーティスト名</label>
      <input class="form-control" type="text" name="name" value="{{ old('name') }}">
    </div>
    <button class="btn btn-primary" type="submit">登録</button>
  </form>
</div>
@endsection

<!-- footer -->
@include('common.footer')

<script type="text/javascript">
</script>
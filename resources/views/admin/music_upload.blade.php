@extends('layout.admin')

<!-- head -->
@section('title', 'Upload')
@section('style')

@endsection
@include('common.admin_head')
<!-- header -->
@include('common.admin_header')

<!-- header -->

<!-- content -->
@section('content')
<div id="app" class="container">
  @if(session('message'))
  <div class="alert alert-success mt-4" role="alert"><strong>{{ session('message') }}</strong></div>
  @endif
  <h3><i class="fa fa-angle-right"></i> アップロード</h3>


  <div id="toggle-btn" class="row fileupload-buttonbar" @change="toggleChange">
    <div class="col-lg-8">
      <label class="btn btn-theme" v-bind:class="{ active: isActive1 }">
        <input type="radio" class="option" name="options" id="option1" value="1" checked> 楽曲
      </label>
      <label class="btn btn-theme02" v-bind:class="{ active: isActive2 }">
        <input type="radio" class="option" name="options" id="option2" value="2"> ジャンル
      </label>
      <label class="btn btn-theme04" v-bind:class="{ active: isActive3 }">
        <input type="radio" class="option" name="options" id="option3" value="3"> アーティスト
      </label>
    </div>
  </div>


  <div v-if="choice == 0">
    <div class="col-md-12">
      <div class="form-panel">
        <h1 class="mt-2 mb-2"><i class="fa fa-angle-right"></i> 楽曲登録</h1>
        <form method="post" action="{{ url('admin/music_upload/music_store') }}" enctype="multipart/form-data">
          @csrf
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
            <select id="0" class="custom-select" name="genres[]" @change="selectChange">
              <option value="0">選択してください</option>
              @foreach($genres as $genre)
              <option value="{{ $genre->id }}">{{ $genre->name }}</option>
              @endforeach
            </select>
          </div>
          <div v-for="(select, index) in selects">
            <div class="form-group">
              <select v-bind:id="index+1" class="custom-select" name="genre[]" @change="selectChange">
                <option value="0">選択してください</option>
                @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label>曲名…ファイルを選ぶと自動で入力されます</label>
            <input class="form-control" type="text" name="name" v-model="musicName" value="{{ old('name') }}">
          </div>
          <div class="form-group">
            <label>価格</label>
            <input class="form-control" type="number" name="price" value="{{ old('price') }}">
          </div>
          <label>音楽ファイル</label>
          <div class="custom-file mb-2">
            <input type="file" class="custom-file-input" id="customMusicfile" name="files[]" @change="musicFileNameChange">
            <label class="custom-file-label" for="customMusicfile" data-browse="参照">ファイル選択...</label>
          </div>
          <label>画像ファイル</label>
          <div class="custom-file mb-2">
            <input type="file" class="custom-file-input" id="customImgfile" name="files[]" @change="imgFileNameChange">
            <label class="custom-file-label" for="customImgfile" data-browse="参照">ファイル選択...</label>
          </div>
          <button class="btn btn-primary" type="submit">登録</button>
        </form>
      </div>
    </div>
    <div class="content-panel">
      <table class="table table-striped table-advance table-hover">
        <thead>
          <tr>
            <td>ID</td>
            <td>アーティスト</td>
            <td>曲名</td>
            <td>長さ</td>
            <td>値段</td>
          </tr>
        </thead>
        <tbody>
          @foreach($musics as $music)
          <tr>
            <td>{{ $music->id }}</td>
            <td>{{ $artists[$music->artist_id - 1]->name }}</td>
            <td>{{ $music->name }}</td>
            <td>{{ $music->time }}</td>
            <td>{{ $music->price }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div v-if="choice == 1">
    <div class="col-md-12">
      <div class="form-panel">
        <h1 class="mb-2 mt-2"><i class="fa fa-angle-right"></i> ジャンル登録</h1>
        <form method="post" action="{{ url('admin/music_upload/genre_store') }}">
          @csrf
          <div class="form-group">
            <label>ジャンル名</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
          </div>
          <button class="btn btn-primary" type="submit">登録</button>
        </form>
      </div>
    </div>
    <div class="content-panel">
      <table class="table table-striped table-advance table-hover">
        <thead>
          <tr>
            <td>ID</td>
            <td>ジャンル名</td>
          </tr>
        </thead>
        <tbody>
          @foreach($genres as $genre)
          <tr>
            <td>{{ $genre->id }}</td>
            <td>{{ $genre->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div v-if="choice == 2">
    <div class="col-md-12">
      <div class="form-panel">
        <h1 class="mb-2 mt-2"><i class="fa fa-angle-right"></i> アーティスト登録</h1>
        <form class="mb-2" method="post" action="{{ url('admin/music_upload/artist_store') }}" enctype="multipart/form-data">
          @csrf
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
          <div class="form-group">
            <label>アーティストの説明</label>
            <textarea class="form-control" rows="3" name="detail">{{ old('detail') }}</textarea>
          </div>
          <label>画像ファイル</label>
          <div class="custom-file mb-2">
            <input type="file" class="custom-file-input" id="Imgfile" name="file" @change="imgFileNameChange">
            <label class="custom-file-label" for="Imgfile" data-browse="参照">ファイル選択...</label>
          </div>
          <button class="btn btn-primary" type="submit">登録</button>
        </form>
      </div>
    </div>
    <div class="content-panel">
      <table class="table table-striped table-advance table-hover">
        <thead>
          <tr>
            <td>ID</td>
            <td>アーティスト名</td>
            <td>説明</td>
          </tr>
        </thead>
        <tbody>
          @foreach($artists as $artist)
          <tr>
            <td>{{ $artist->id }}</td>
            <td>{{ $artist->name }}</td>
            <td>{{ $artist->description }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<style type="text/css">
  .custom-file {
    overflow: hidden;
  }

  .custom-file-label {
    white-space: nowrap;
  }
</style>
<script type="text/javascript">
  new Vue({
    el: '#app',
    data: {
      musicName:'',
      choice:0,
      isActive1:true,
      isActive2:false,
      isActive3:false,
      selects:[],
    },
    methods: {
      musicFileNameChange(e) {
        e.target.labels[0].innerText = e.target.files[0].name;
        this.musicName = e.target.files[0].name.split( '.' )[0];
      },
      imgFileNameChange(e) {
        e.target.labels[0].innerText = e.target.files[0].name;
      },
      toggleChange(e) {
        if(e.target.value == 1){
          this.isActive1 = true;
          this.isActive2 = false;
          this.isActive3 = false;
          this.choice = 0;
        } else if(e.target.value == 2){
          this.isActive1 = false;
          this.isActive2 = true;
          this.isActive3 = false;
          this.choice = 1;
        } else {
          this.isActive1 = false;
          this.isActive2 = false;
          this.isActive3 = true;
          this.choice = 2;
        }
      },
      selectChange(e){
        if(!this.selects.some(item => item === e.target.value) && e.target.value !== "0"){
          this.selects.splice(e.target.id,1,e.target.value);
        }
      }
    }
  });
</script>
@endsection

<!-- footer -->
@include('common.admin_footer')
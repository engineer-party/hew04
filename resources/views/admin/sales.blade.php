@extends('layout.admin')

<!-- head -->
@section('title', 'sales')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css',$is_production)}}" /> -->

@endsection
@include('common.admin_head')
<!-- header -->
@include('common.admin_header')

<!-- content -->
@section('content')
<h3><i class="fa fa-angle-right"></i> 売上</h3>
<div class="col-md-12">
  <div class="content-panel">
    <table class="table table-striped table-advance table-hover">
      <h4><i class="fa fa-angle-right"></i> 楽曲売上順</h4>
      <hr>
      <thead>
        <tr>
          <th>#</th>
          <th>タイトル</th>
          <th>アーティスト</th>
          <th>ジャンル</th>
          <th>定価</th>
          <th>売上数</th>
          <th>売上額</th>
          <th>割引</th>
        </tr>
      </thead>
      <tbody>
      @foreach($musics as $music)
        <tr>
          <td>{{ $music->id }}</td>
          <td>{{ $music->name }}</td>
          <td>{{ $music->artist()->first()->name }}</td>
          <td>
            @foreach ($music->genres()->get() as $genre)
            @if (!$loop->first)
              ,
            @endif
              {{ $genre->name }}
            @endforeach
          </td>
          <td>{{ number_format($music->price) }}</td>
          <td>{{ $music->buy_users_count }}</td>
          <td>{{ number_format($music->buyUsers()->get()->sum('buy_point') + $music->buyUsers()->get()->sum('buy_price')) }}</td>
          <td>
            <a href="/admin/price/sales/music/{{ $music->id }}"><button class="btn btn-success btn-xs"><i class="fa fa-percent" aria-hidden="true"></i></button>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {{ $musics->links() }}
    </div>

  </div>
  <!-- /content-panel -->
</div>
<!-- /col-md-12 -->
<br>
<div class="col-md-12">
  <div class="content-panel">
    <table class="table table-striped table-advance table-hover">
      <h4><i class="fa fa-angle-right"></i> アーティスト売上順</h4>
      <hr>
      <thead>
        <tr>
          <th>#</th>
          <th>名前</th>
          <th>楽曲数</th>
          <th>総売上数</th>
          <th>総売上額</th>
          <th>割引</th>
        </tr>
      </thead>
      <tbody>
      @foreach($artists as $artist)
        <tr>
          <td>{{ $artist->id }}</td>
          <td>{{ $artist->name }}</td>
          <td>{{ $artist->musics_count }}</td>
          <td>
            @php
              $sumMusics = 0;
            @endphp
            @foreach ($artist->musics()->get() as $music)
              @php
              $sumMusics += $music->buyUsers()->count();
              @endphp
            @endforeach
            {{ number_format($sumMusics) }}
          </td>
          <td>
            @php
              $sumPrice = 0;
            @endphp
            @foreach ($artist->musics()->get() as $music)
              @php
              $sumPrice += $music->buyUsers()->get()->sum('buy_point') + $music->buyUsers()->get()->sum('buy_price');
              @endphp
            @endforeach
            {{ number_format($sumPrice) }}
          </td>
          <td>
            <a href="/admin/price/sales/artist/{{ $artist->id }}"><button class="btn btn-success btn-xs"><i class="fa fa-percent" aria-hidden="true"></i></button>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {{ $artists->links() }}
    </div>

  </div>
  <!-- /content-panel -->
</div>
<!-- /col-md-12 -->

@endsection

<!-- footer -->
@include('common.admin_footer')
@extends('layout.admin')

<!-- head -->
@section('title', 'sales')
@section('style')
<!-- <link rel="stylesheet" href="{{asset('css/admin.css')}}" /> -->

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
            <td>{{ $music->price }}</td>
            <td>{{ $music->buy_users_count }}</td>
            <td>{{ $music->buyUsers()->get()->sum('buy_point') + $music->buyUsers()->get()->sum('buy_price') }} </td>
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
</div>
<!-- /row -->
@endsection

<!-- footer -->
@include('common.admin_footer')
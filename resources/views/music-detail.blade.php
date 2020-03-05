@extends('layout.layout')

<!-- head -->
@section('title', 'MusicDeail')
@section('style')
<link rel="stylesheet" href="{{asset('css/mypage.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/link.css',$is_production)}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css',$is_production)}}" />

<script src="{{ asset('js/music.js',$is_production) }}" defer></script>
<script src="{{ asset('js/hbg.js',$is_production) }}" defer></script>


@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')
 <article id="mypage">
<div class="contents">
  <div class="img">
  </div>
  <div class="text">
    <ul>
      @if(session('message'))
      <div class="alert alert-success mt-4" role="alert"><strong>{{ session('message') }}</strong></div>
      @endif
    <li><span class="value">{{ $music->name }}</span><br><span class="text-in">タイトル</span></li>
    <li><span class="value">{{ $music->artist()->first()->name }}</span><br><span class="text-in">アーティスト</span></li>
    <li><span class="value">{{ substr($music->time, 0, 5) }}</span><br><span class="text-in">再生時間</span></li>
    </ul>
  </div>
  @if (!$flag)
    @if($point >= $music->price)
      <form method="post" action="{{ url('detail/music/buy_point',null,$is_production) }}">
        @csrf
        <input type="hidden" name="id" value="{{ $music->id }}">
        <input type="hidden" name="value" value="{{ $music->price }}">
        <button class="btn buy-btn2"><span class="point-icon">P</span>{{ $music->price }}</button>
      </form>
      @else
      <form method="post" action="{{ url('detail/music/buy',null,$is_production) }}">
        @csrf
        <script
          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="{{ env('STRIPE_KEY') }}"
          data-amount="{{ $music->price - $point }}"
          data-name="Hunting Music"
          data-label="購入"
          data-description="楽曲の購入"
          data-image="{{ $image_path }}"
          data-locale="auto"
          data-currency="JPY">
        </script>
        <input type="hidden" name="id" value="{{ $music->id }}">
        <input type="hidden" name="pay" value="{{ $music->price - $point }}">
        <input type="hidden" name="value" value="{{ $music->price }}">
        <button class="btn buy-btn"><span class="point-icon">P</span>{{ $music->price }}</button>
      </form>
    @endif
  @endif
  </div>
</article>
@endsection

<!-- footer -->
@include('common.footer')

<script>
  
</script>


<style>
  
  #link-list li:nth-child(1)::before{
    background-image: url({{ asset('img/home.png',$is_production) }});
  }
  #link-list li:nth-child(2)::before{
    background-image: url({{ asset('img/hunt.png',$is_production) }});
  }
  #link-list li:nth-child(3)::before{
    background-image: url({{ asset('img/streaming.png',$is_production) }});
  }
  #link-list li:nth-child(4)::before{
    background-image: url({{ asset('img/playlist.png',$is_production) }});
  }
  #app .search{
    display: none;
  }

  h1{
    display: none;
  }
  
  
  .img {
    background-image: url({{ $music->img_url }});
  }
  .img::before{
    content: "{{ $music->name }}";
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    letter-spacing: 0px;
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
  }

  #app #form {
    display: none;
  }

  #app {
    width: 100%;
/*    background-color: #ff5757;*/
    position: relative;
    top: 0;
    left: 0;
    z-index: 100;
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
    letter-spacing: 4px;
  }
  
  .buy-btn {
    width: 90%;
/*    margin: 0 auto;*/
    position: relative;
    left: 50%;
    transform: translate(-50%);
    line-height: 50px;
    height: 50px;
    color: #ff5757;
    background-color: white;
    font-size: 1.0em;
    top: -50px;
    z-index: 2;
  }

  .buy-btn2 {
    width: 90%;
/*    margin: 0 auto;*/
    position: relative;
    left: 50%;
    transform: translate(-50%);
    line-height: 50px;
    height: 50px;
    color: #ff5757;
    background-color: white;
    font-size: 1.0em;
    margin-top: 50px;
  }
  
  .text {
    padding-top: 10px;
  }
  
  .stripe-button-el {
  display: inline-block !important;
  cursor: pointer !important;
  width: 90% !important;
  height: 50px !important;
  background-color: white !important;
  color: #ff5757 !important;
  border-radius: 0px !important;
  font-weight: 400 !important;
  text-align: center !important;
  white-space: nowrap !important;
  vertical-align: middle !important;
  -webkit-user-select: none !important;
  -moz-user-select: none !important;
  -ms-user-select: none !important;
  user-select: none !important;
  border: 1px solid transparent !important;
  padding: .375rem .75rem !important;
  font-size: .9rem !important;
  line-height: 50px !important;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
  background-image: none !important;
  background: white !important;
  font-weight: normal !important;
  text-shadow: none !important;
  font-size: 1.0em !important;
  background-image: -webkit-linear-gradient(#ff5757) !important;
  background-image: linear-gradient(#ff5757) !important;
  z-index: 1 !important;
  position:relative !important;
  left: 50% !important;
  transform: translate(-50%) !important;
  margin-top: 50px !important;
}

.stripe-button-el > span {
  display: inline-block !important;
  cursor: pointer !important;
  width: 90% !important;
  height: 50px !important;
  background-color: white !important;
  color: #ff5757 !important;
  border-radius: 0px !important;
  font-weight: 400 !important;
  text-align: center !important;
  white-space: nowrap !important;
  vertical-align: middle !important;
  -webkit-user-select: none !important;
  -moz-user-select: none !important;
  -ms-user-select: none !important;
  user-select: none !important;
  border: 1px solid transparent !important;
  padding: .375rem .75rem !important;
  font-size: .9rem !important;
  line-height: 50px !important;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
  background-image: none !important;
  background: white !important;
  font-weight: normal !important;
  text-shadow: none !important;
  font-size: 1.0em !important;
  background-image: -webkit-linear-gradient(#ff5757) !important;
  background-image: linear-gradient(#ff5757) !important;
  z-index: 1 !important;
  position:relative !important;
  box-shadow: none !important;
  left: 50% !important;
  transform: translate(-50%) !important;
  margin-top: 50px !important;
}
</style>

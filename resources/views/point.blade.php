@extends('layout.layout')

<!-- head -->
@section('title', 'PlayList')
@section('style')
<link rel="stylesheet" href="{{asset('css/link.css')}}" />
<link rel="stylesheet" href="{{asset('css/hbg.css')}}" />



<script src="{{ asset('js/point.js') }}" defer></script>
<script src="{{ asset('js/hbg.js') }}" defer></script>

@endsection
@include('common.head')

<!-- header -->
@include('common.header')

<!-- content -->
@section('content')

<div id="contents">
<!--繰り返し要素・ポイント-->
<div class="point" v-for="item in values">
  <ul>
    <li class="point-icon">P</li>
    <li class="point-value">@{{ item.point }} P</li>
  </ul>
  <p class="point-survice">+@{{ item.survice }}P</p>
  <label for="checkbox">
    <input type="checkbox" id="checkbox" v-model="checked" v-bind:value="item.value">¥@{{ item.value }}
  </label>
  <transition :name="animate">
  <div class="point-buy" v-if="checked">
    <h3>Hunc</h3>
    <ul>
      <li class="icon"></li>
      <li class="point-value">@{{ item.point }} P</li>
      <li class="point-icon">P</li>
    </ul>
    <p class="pay-value">¥@{{ item.value }}</p>
    <button class="btn back-btn" @click="checked = false">戻る</button>
    <button class="btn pay-btn" @click="checked = false">購入</button>
  </div>
  </transition>
</div>
<!-- END -->
</div>
 
<script>
  let point = new Vue({
    el: '#contents',
    data:{
      values: [
        //point:ポイント value:値段 survice:プラスで得られるポイント
        {point:200,value:220,survice:1000},
        {point:500,value:550,survice:1000}

      ],
      checked: false,
      animate: 'bottom'
    }
  })
</script>
  
@endsection

<!-- footer -->
@include('common.footer')

<style type="text/css">
  #link-list li:nth-child(4) {
    background: rgba(0, 0, 0, 0.1);
  }

  #link-list li:nth-child(4) .link-title {
    color: #ff5757;
  }

  #link-list li:nth-child(1)::before {
    background-image: url({{ asset('img/home.png')}});
  }
  
  #link-list li:nth-child(2)::before {
    background-image: url({{ asset('img/hunt.png')}});
  }
  
  #link-list li:nth-child(3)::before {
    background-image: url({{ asset('img/streaming.png')}});
  }
  
  #link-list li:nth-child(4)::before {
    background-image: url({{ asset('img/playlist-active.png')}});
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
  }

  #app #form {
    display: none;
  }

  #app {
    width: 100%;
    background-color: #ff5757;
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
  #contents {
    width: 95%;
    margin: 0 auto;
    margin-top: 50px;
  }
  .point {
    display: flex;
    width: 100%;
    height: 50px;
    justify-content: space-around;
    background-color: white;
    border-radius: 4px;
    margin-bottom: 10px;
  }
  .point ul{
    display: flex;
  }
  .point .point-icon{
    background-color: goldenrod;
    width: 30px;
    height: 30px;
    border-radius: 15px;
    margin-top: 10px;
    text-align: center;
    line-height: 28px;
    font-weight: 600;
    border: solid gold 2px;
    color: gold;
  }
  .point .point-value{
    margin-left: 10px;
    height: 50px;
    width: 20vw;
    line-height: 50px;
/*    background-color: coral;*/
  }
  .point .point-survice{
    height: 50px;
    width: 25%;
    line-height: 50px;
/*    background-color: darkcyan;*/
    font-size: 0.8em;
    text-align: left;
    color: #ff5757;
  }
  .point .point-buy{
    position: absolute;
    width: 100%;
    height: auto;
    bottom: 0;
    left: 0;
    background-color: white;
  }
  .point .point-buy::before{
    width: 100%;
    height: 100vh;
    position: absolute;
    top: -100vh;
    left: 0;
/*    z-index: -1;*/
    background: rgba(0,0,0,0.3);
    display: block;
    content: '';
  }
  .point input{
    display: none;
  }
  .point label{
    width: 20%;
    height: 40px;
    line-height: 40px;
    text-align: center;
    margin-top: 5px;
    background-color: #ff5757;
    color: white;
    border-radius: 5px;
  }
  .point .point-buy h3{
    color: rgba(0,0,0,0.4);
    font-weight: 700;
    font-size: 1.2em;
    width: 100%;
    line-height: 40px;
    height: 40px;
    padding-left: 20px;
    border-bottom: solid rgba(0,0,0,0.2) 1px;
    letter-spacing: 2px;
  }
  .point .point-buy ul{
    display: flex;
    height: 100px;
    justify-content: space-between;
    border-bottom: solid rgba(0,0,0,0.2) 1px;
  }
  .point .point-buy .icon{
    width: 80px;
    height: 40px;
    border-radius: 2px;
    background-size: cover;
    margin-top: 25px;
    margin-left: 20px;
  }
  .point .point-buy .point-value{
    margin-left: -100px;
    margin-top: 25px;
    width: auto;
    color: goldenrod;
    font-size: 1.2em;
  }
  .point .point-buy .point-icon{
    margin-right: 20px;
    margin-top: 35px;
  }
  .point .point-buy .icon{
    background-image: url({{ asset('img/Hunc02.png') }})
  }
  .point .point-buy .pay-value{
    width: 100%;
    height: 60px;
    text-align: center;
    font-size: 1.2em;
    line-height: 60px;
    color: #ff5757;
    border-bottom: solid rgba(0,0,0,0.2) 1px;
  }
  .point .point-buy .pay-btn,
  .point .point-buy .back-btn{
    width: 100%;
    height: 50px;
    background-color: #ff5757;
    color: white;
  }
  .point .point-buy .back-btn {
    background-color: #404040;
  }
  
  /* left */
.bottom-enter-active, .bottom-leave-active {
  transform: translate(0px, 0px);
  transition: transform 350ms cubic-bezier(0, 0, 0.2, 1) 0ms;
}

.bottom-enter, .bottom-leave-to {
  transform: translateX(0px) translateY(200vh);
}
/* end */
</style>
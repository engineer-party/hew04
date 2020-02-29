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
  @if(session('message'))
  <div class="alert alert-success mt-4" role="alert"><strong>{{ session('message') }}</strong></div>
  @endif
<!--繰り返し要素・ポイント-->

<div class="point" v-for="(item, index) in values" :key="item.id">
  <ul>
    <li class="point-icon">P</li>
    <li class="point-value">@{{ String( item.point ).replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,' ) }} P</li>
  </ul>
  <p class="point-survice">+@{{ String( item.survice ).replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,' ) }}P</p>
  <label class="item.id">
    <input type="checkbox" :class="item.id" @click="buyEvent(item.id)" v-bind:value="item.value">¥@{{ String( item.value ).replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,' ) }}
  </label>
  <transition :name="animate">
  <div class="point-buy" v-if="item.checked">
    <h3>Hunc</h3>
    <ul>
      <li class="icon"></li>
      <li class="point-value">@{{ String( item.point ).replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,' ) }} P</li>
      <li class="point-icon">P</li>
    </ul>
    <p class="pay-value">¥@{{ String( item.value ).replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,' ) }}</p>
    <button class="btn back-btn" @click="item.checked = false">戻る</button>
    <form method="post" action="{{ url('point/charge') }}">
    @csrf
      <div is="script"
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{ env('STRIPE_KEY') }}"
        :data-amount="item.value"
        data-name="Hunting Music"
        data-label="購入"
        data-description="ポイントの購入"
        data-image="{{ $image_path }}"
        data-locale="auto"
        data-currency="JPY">
      </div>
      <input type="hidden" name="value" :value="item.value">
      <input type="hidden" name="point" :value="item.value + item.survice">
    </form>
    <!--<button class="btn pay-btn" name="point" :value="item.value + item.survice" @click="item.checked = false" disabled>購入</button>-->
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
        {id:0,checked:false,point:1000,value:1000,survice:100},    //0.10
        {id:1,checked:false,point:1500,value:1500,survice:200},    //0.13  1.5  0.3
        {id:2,checked:false,point:2000,value:2000,survice:300},    //0.15  1.3  0.2
        {id:3,checked:false,point:3000,value:3000,survice:600},    //0.20  1.5  0.5
        {id:4,checked:false,point:5000,value:5000,survice:1200},   //0.24  1.6  0.4
        {id:5,checked:false,point:7500,value:7500,survice:2250},   //0.30  1.5  0.6
        {id:6,checked:false,point:10000,value:10000,survice:3500}  //0.35  1.3  0.5

      ],
      animate: 'bottom'
    },
    methods: {
      buyEvent: function(index){
        this.values[index].checked = true;
        this.values.splice();
        console.log(this.values[index].checked);
        console.log(index);
      }
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
    position: fixed;
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
    border-radius: 0px;
  }
  .point .point-buy .back-btn {
    background-color: #404040;
    border-radius: 0px;
  }
  
  /* left */
.bottom-enter-active, .bottom-leave-active {
  transform: translate(0px, 0px);
  transition: transform 350ms cubic-bezier(0, 0, 0.2, 1) 0ms;
}

.bottom-enter, .bottom-leave-to {
  transform: translateX(0px) translateY(200vh);
}

.stripe-button-el {
  display: inline-block !important;
  cursor: pointer !important;
  width: 100% !important;
  height: 50px !important;
  background-color: #ff5757 !important;
  color: white !important;
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
  line-height: 1.6 !important;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
  background-image: none !important;
  background: #ff5757 !important;
  font-weight: normal !important;
  text-shadow: none !important;
  font-size: 16px !important;
  background-image: -webkit-linear-gradient(#ff5757) !important;
  background-image: linear-gradient(#ff5757) !important;
  z-index: 1 !important;
  position:static !important;
}

.stripe-button-el > span {
  display: inline-block !important;
  cursor: pointer !important;
  width: 100% !important;
  height: 50px !important;
  background-color: #ff5757 !important;
  color: white !important;
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
  line-height: 1.6 !important;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
  background-image: none !important;
  background: #ff5757 !important;
  font-weight: normal !important;
  text-shadow: none !important;
  font-size: 16px !important;
  background-image: -webkit-linear-gradient(#ff5757) !important;
  background-image: linear-gradient(#ff5757) !important;
  z-index: 1 !important;
  position:static !important;
  box-shadow: none !important;
}
/* end */
</style>
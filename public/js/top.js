/*
let app = new Vue({
    el: '#app',
    data: function(){
      return {
        /*
        items: [
          {message: 'コレサワ'},
          {message: 'YUI'},
          {message: 'DAOKO'},
          {message: '吉澤嘉代子'},
          {message: '井上苑子'}
        ],
        
        searchOpen: false,
        transition: 'fade'
      }
    },
    methods: {
      openMethod: function(){
        if(this.searchOpen == false){
          console.log('open');
          this.searchOpen = true;
        }
      },
      closeMethod: function(){
        if(this.searchOpen == true){
          console.log('close');
          this.searchOpen = false;
        }
      }
    }
  })
*/

let app = new Vue({
  el: '#app',
  data: function(){
    return {
      placeholder: '',
    }
  },
  methods: {
    inputActive: function(){
      this.placeholder = 'Musicを検索';
    },
    inputSleep: function(){
      this.placeholder = '';
    }
  }
})


$(function(){
  
  let headOpen = false;
  let linkOpen = false;
  $('.form').css('background-image', 'url(img/headerImg.png)');
  
  $('.form').hammer().on('tap',function(){
    if(headOpen == false){
      headOpen = true;
      console.log('head-open');
      $('.menu-trigger').addClass("active");
      $('.form').css('opacity', 1);
      $(this).css('background-image', 'none');
    }
    
  });
  $('.menu-trigger').hammer().on('tap',function(){
    if(headOpen == true){
      headOpen = false;
      console.log('head-close');
      $('.menu-trigger').removeClass("active");
      $('.form').css('background-image', 'url(img/headerImg.png)');
    }
    else if(headOpen == false){
      linkOpen = true;
      console.log('link-open');
      $('#link').addClass("link-active");
    }
  });
  
  $('#link').hammer().on('swipe',function(){
    linkOpen = false;
    console.log('link-close');
    $(this).removeClass("link-active");
  });
  
});
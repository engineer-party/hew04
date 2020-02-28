let headOpen = false;
let linkOpen = false;

let app = new Vue({
  el: '#app',
  data: function(){
    return {
      placeholder: '',
      value: ''
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
  $('#form').css('background-image', 'url(img/headerImg.png)');
  
  $('#form').hammer().on('tap', function (){
    if(headOpen == true){
      $('#form').css('background-image', 'none');
    }
  });
  
  $('.menu-trigger').hammer().on('tap', function (){
    if(headOpen == false){
      $('#form').css('background-image', 'url(img/headerImg.png)');
    }
  });

});

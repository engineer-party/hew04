let headOpen = false;
let linkOpen = false;

let app = new Vue({
  el: '#app',
  data: function(){
    return {
      placeholder: '',
      value: '',
//      cateActive: true
    }
  },
  methods: {
    inputActive: function(){
      this.placeholder = 'Musicを検索';
//      this.cateActive = true;
//      console.log(this.cateActive);
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
      $('.search').addClass('activecategory');
    }
  });
  
  $('.menu-trigger').hammer().on('tap', function (){
    if(headOpen == false){
      $('#form').css('background-image', 'url(img/headerImg.png)');
      $('.search').removeClass('activecategory');
    }
  });

});

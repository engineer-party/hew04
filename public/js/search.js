let headOpen = false;
let linkOpen = false;


$(function(){
  $(window).on('load',function(){
//    $('#contents').css('display','block');
//    $('#contents').animate({transform: 'translate(0,-100vh)'}, 300);
      $('#contents').delay(500).fadeIn(500);
  });
  $('#form').hammer().on('tap', function (){
    if(headOpen == true){
      $('.search').addClass('activecategory');
    }
  });
  
  $('.menu-trigger').hammer().on('tap', function (){
    if(headOpen == false){
      $('.search').removeClass('activecategory');
    }
  });
});
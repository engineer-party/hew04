let headOpen = false;
let linkOpen = false;

$('.menu-trigger').hammer().on('tap', function () {
  if (linkOpen == false) {
    $('.musicIcon').animate({opacity: 0},100);
  }
});

$('#link').hammer().on('swipe', function () {
  $('.musicIcon').animate({opacity: 1},100);
});
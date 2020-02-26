
$('#form').hammer().on('tap', function () {
  if (headOpen == false) {
    headOpen = true;
    console.log('head-open');
    $('.menu-trigger').addClass("active");
  }
});
$('.menu-trigger').hammer().on('tap', function () {
  if (headOpen == true) {
    headOpen = false;
    console.log('head-close');
    $('.menu-trigger').removeClass("active");
  } else if (headOpen == false) {
    linkOpen = true;
    console.log('link-open');
    $('#link').addClass("link-active");
  }
});
$('#link').hammer().on('swipe', function () {
  linkOpen = false;
  console.log('link-close');
  $(this).removeClass("link-active");
});
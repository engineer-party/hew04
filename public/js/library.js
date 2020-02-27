let headOpen = false;
let linkOpen = false;
let startValue = 0;

/*
export default {
  data(){
    return {
      isActive01: false
    }
  }
}
*/

let modal = new Vue({
  el: '#contents',
  data: function () {
    return {
      items: [
        {
          name: 'プレイリスト',
          open: false
        },
        {
          name: '曲',
          open: false
        },
        {
          name: 'アーティスト',
          open: false
        },
        {
          name: 'アルバム',
          open: false
        }
      ],
      animate: 'left',
      activetab: 1,
      playlistActive: false,
      headerBrade: false
    }
  }
});

$(function () {

  
  $.ajax({
    type: 'GET', //GETかPOSTか
    url: 'playlist', //url+ファイル名 .htmlは省略可
    dataType: 'html', //他にjsonとか選べるとのこと
  }).done(function (results) {
    $('.box').html(results); //展開したいタグのidを指定
  }).fail(function (jqXHR, textStatus, errorThrown) {
    alert('ファイルの取得に失敗しました。');
    console.log("ajax通信に失敗しました")
    console.log(jqXHR.status);
    console.log(textStatus);
    console.log(errorThrown.message);
  });

  $('.ajax-action1').click( //起動するボタンなどのid名を指定
    function () {
      $.ajax({
        type: 'GET', //GETかPOSTか
        url: 'playlist', //url+ファイル名 .htmlは省略可
        dataType: 'html', //他にjsonとか選べるとのこと
      }).done(function (results) {
        $('.box').html(results); //展開したいタグのidを指定
      }).fail(function (jqXHR, textStatus, errorThrown) {
        alert('ファイルの取得に失敗しました。');
        console.log("ajax通信に失敗しました");
        console.log(jqXHR.status);
        console.log(textStatus);
        console.log(errorThrown.message);
      });
    }
  );

  $('.ajax-action2').click( //起動するボタンなどのid名を指定
    function () {
      $.ajax({
        type: 'GET', //GETかPOSTか
        url: 'music', //url+ファイル名 .htmlは省略可
        dataType: 'html', //他にjsonとか選べるとのこと
      }).done(function (results) {
        $('.box').html(results); //展開したいタグのidを指定
      }).fail(function (jqXHR, textStatus, errorThrown) {
        alert('ファイルの取得に失敗しました。');
        console.log("ajax通信に失敗しました")
        console.log(jqXHR.status);
        console.log(textStatus);
        console.log(errorThrown.message);
      });
    }
  );


  $('.box').scroll(function () {

    let scrollValue = $(this).scrollTop();
    console.log(scrollValue);
    headerSlide(scrollValue);

  });
  
  $('.library-link').click(function(){
    $('.box').animate({top: '100vh'}, 200);
    $('.loading').fadeIn(50);
    setTimeout(function(){
        $('.box').animate({top: '0%'}, 200);
        $('.loading').fadeOut(50);
      }, 400);
  });
  
    
});

/*------- headerSlide関数 -------*/
function headerSlide(nowValue) {

  //スクロール量増減判定
  if (nowValue > startValue) {
    //増
    console.log('plus');
    $('#navber').slideUp(50);
  } else {
    //減
    console.log('minas');
    $('#navber').slideDown(100);
  }
  startValue = nowValue;

  return;
}
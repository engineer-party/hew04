let headOpen = false;
let linkOpen = false;
let startValue = 0;


$(function(){
  $('.btn-audio').on('click',function(){
    console.log('hey');
  });
/*
    var clicked;  //クリックされた li 要素を格納する変数
    var a = audiojs.createAll({
        //曲が終了した時の処理
        trackEnded: function() {
            //クリックして再生した曲の li 要素のクラスが「last」の場合、終了して非表示に
            if($('.audio li.playing', clicked.closest('div.audio')).hasClass('last')){
                $('div.audiojs, div.track-details').fadeOut('slow');
                $('.audio li.playing').removeClass('playing');
                return;
           }
           //次の曲を設定
           var next = $('.audio li.playing', clicked.closest('div.audio')).next();
           if (!next.length) next = $('.audio li', clicked.closest('div.audio')).first();
           next.addClass('playing').siblings().removeClass('playing');
           //曲名を「div.track-details」に表示
           $('div.track-details').html(next.closest('li').text());
           //プレイヤー（再生バー）をリストの後に追加（appendTo）して表示
           $('div.audiojs, div.track-details').appendTo(next.closest('div')).fadeIn('slow');
           //プレイヤーをリストの直後に入れる場合はinsertAfterで
           //$('div.audiojs, div.track-details').insertAfter(next.closest('div').find('ol')).fadeIn('slow');
           //曲を再生
           audio.load($('a', next).attr('data-src'));
           audio.play();
        }
    });
        
    // 最初の曲をロード
    var audio = a[0];
    first = $('.audio a').attr('data-src');
    $('.audio li').first().addClass('playing');
    audio.load(first);
    
    // プレイヤー（再生バー）と曲の情報は最初は非表示に  
    $('div.audiojs, div.track-details').css('display', 'none');
 
    //クリックされた曲をロードして再生
    $('.audio-btn').click(function(e) {
        console.log('hey');
        clicked = $(this);
        e.preventDefault();
        $('div.track-details').html($(this).closest('li').text()).appendTo($(this).closest('div')).fadeIn('slow');
        $('div.audiojs, div.track-details').appendTo($(this).closest('div')).fadeIn('slow');
         //プレイヤーをリストの直後に入れる場合
         //$('div.audiojs, div.track-details').insertAfter(next.closest('div').find('ol')).fadeIn('slow');
        $(this).addClass('playing').siblings().removeClass('playing');
        audio.load($('a', this).attr('data-src'));
        audio.play();
    });
    */
});

/*
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

  $('.1').click( //起動するボタンなどのid名を指定
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

  
  
  
/*
  $('.box').scroll(function () {

    let scrollValue = $(this).scrollTop();
    console.log(scrollValue);
    headerSlide(scrollValue);

  });

  $('.library-link').click(function () {
    $('.box').animate({
      top: '100vh'
    }, 200);
    $('.loading').fadeIn(50);
    setTimeout(function () {
      $('.box').animate({
        top: '0%'
      }, 200);
      $('.loading').fadeOut(50);
    }, 400);
  });
  
});

/*
let modal = new Vue({
  el: '#navber',
  data: function () {
    return {
      animate: 'left',
      activetab: 1,
      headerBrade: false,
      playlistinAct: false,
    }
  },
  methods: {

  }
});

*/

/*------- headerSlide関数 -------
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
*/
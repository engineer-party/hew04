let headOpen = false;
let linkOpen = false;
let startValue = 0;


jQuery(function($){
    var clicked;  //クリックされた li 要素を格納する変数
    var a = audiojs.createAll({
        //曲が終了した時の処理
        trackEnded: function() {
            //クリックして再生した曲の li 要素のクラスが「last」の場合、終了して非表示に
          if($('ol li.playing', clicked.closest('div.cd')).hasClass('last')){
              $('div.audiojs, div.track-details').fadeOut('slow');
              $('ol li.playing').removeClass('playing');
              return;
           }
           //次の曲を設定
           var next = $('ol li.playing', clicked.closest('div.cd')).next();
           if (!next.length) next = $('ol li', clicked.closest('div.cd')).first();
           next.addClass('playing').siblings().removeClass('playing');
           //曲名を「div.track-details」に表示
           $('div.track-details').html(next.closest('li').text());
           //プレイヤー（再生バー）をリストの後に追加（appendTo）して表示
           $('div.audiojs, div.track-details').appendTo(next.closest('div')).fadeIn(200);
           //プレイヤーをリストの直後に入れる場合はinsertAfterで
           //$('div.audiojs, div.track-details').insertAfter(next.closest('div').find('ol')).fadeIn('slow');
           //曲を再生
           audio.load($('a', next).attr('data-src'));
           audio.play();
        }
    });
        
    // 最初の曲をロード
    var audio = a[0];
    first = $('ol a').attr('data-src');
    $('ol li').first().addClass('playing');
    audio.load(first);
    
    // プレイヤー（再生バー）と曲の情報は最初は非表示に
    $('div.audiojs, div.track-details').css('display', 'none');
 
    //クリックされた曲をロードして再生
    $('.play-btn').click(function(e) {
//        clicked = $(this);
//        e.preventDefault();
        $('div.track-details').html($('.cd li:eq(0)').closest('li').text()).appendTo($(this).closest('div')).fadeIn('slow');
        $('div.audiojs, div.track-details').appendTo($('.cd').closest('div')).fadeIn(200);
         //プレイヤーをリストの直後に入れる場合
         //$('div.audiojs, div.track-details').insertAfter(next.closest('div').find('ol')).fadeIn('slow');
        $(this).addClass('playing').siblings().removeClass('playing');
        audio.load($('a','.cd li:eq(0)').attr('data-src'));
        audio.play();
    });
});
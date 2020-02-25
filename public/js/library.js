let headOpen = false;
let linkOpen = false;

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
      activetab: 1
    }
  }
});

/*
$(function () {
  $('.ajax-action1').click( //起動するボタンなどのid名を指定
    function () {
      $.ajax({
        type: 'GET', //GETかPOSTか
        url: 'playlist', //url+ファイル名 .htmlは省略可
        dataType: 'text', //他にjsonとか選べるとのこと
      }).done(function (results) {
        $('.activeobj').html(results); //展開したいタグのidを指定
      }).fail(function (jqXHR, textStatus, errorThrown) {
        alert('ファイルの取得に失敗しました。');
        console.log("ajax通信に失敗しました")
        console.log(jqXHR.status);
        console.log(textStatus);
        console.log(errorThrown.message);
      });
    }
  );
});
*/
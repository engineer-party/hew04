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
  el:'#contents',
  data: function(){
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
})
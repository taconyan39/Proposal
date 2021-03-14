<template>
  <div>
    <button @click="show">投稿する</button>
    <v-dialog></v-dialog>
  </div>
</template>

<script>
import VModal from 'vue-js-modal';
Vue.use(VModal, {dialog: true});

export default {
  methods: {
    show : function() {
      this.$modal.show('dialog', {
        title: 'アイデアの投稿',
        text: '投稿しますか？',
        buttons: [
          {
            title: '投稿する',
            handler: () => { alert('投稿しました') }
          },
          {
            title: 'キャンセル',
            handler: () => {
              this.$modal.hide('dialog')
            }
          }
        ]
      });
    },
    hide : function () {
      this.$modal.hide('hello-world');
    },
  }
}
</script>

<style>
.modal-area-inner{
  padding: 10px;
  box-sizing: border-box;
  position: relative;
}
.modal-area-inner .hide{
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 12px;
}
</style>
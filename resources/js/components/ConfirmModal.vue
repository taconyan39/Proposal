<template>
<div>
  <button v-on:click="show" class="button">show!</button>
  <modal name="hello-world" :draggable="true" :resizable="true">
    <div class="modal-header">
      <h2>Modal title</h2>
    </div>
    <div class="modal-body">
      <p>投稿します。よろしいですか？</p>
      <button v-on:click="hide">閉じる</button>
    </div>  
  </modal>
 </div>
</template>

<script>
import VModal from 'vue-js-modal';
Vue.use(VModal);

export default {
  methods: {
    show : function() {
      this.$modal.show('hello-world');
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
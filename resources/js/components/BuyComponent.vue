
<template>
<!-- 購入処理用コンポーネント -->
    <div class="c-btn__wrapper p-buy__btn--wrapper">
        <button
        name="buy"
        class="c-btn--large p-buy__btn
        c-btn--action2
        "
        id="buy"
        @click.prevent="onBuy">
            購入する
        </button>
        <v-dialog></v-dialog>
    </div>
</template>

<script>
export default {
    methods:{
        onBuy: function(){
            //   購入の確認
            this.$modal.show('dialog', {
                title: 'アイデアの購入',
                text: '購入しますか？',
                buttons: [{
                    title: '購入する',
                    handler: () => {
                       document.buy.submit();
                    }
                },
                {
                    title: 'キャンセル',
                    handler: () => {
                        this.$modal.hide('dialog')
                    }
                }
                ]
            });
            
        }
    },
}
</script>


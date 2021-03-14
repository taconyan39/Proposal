<template>
<!-- 気になる解除用コンポーネント -->
    <button class="c-btn c-form__btn p-ideaPost__btn--remove"
    @click.prevent="onRemove()">
        削除する
    </button>
</template>

<script>
import VModal from 'vue-js-modal';
Vue.use(VModal, {dialog: true});

export default {
    methods: {
        onRemove(){
            //   削除の確認
            this.$modal.show('dialog', {
                title: 'アイデアの削除',
                text: '削除しますか？',
                buttons: [{
                    title: '削除する',
                    handler: () => {
                       document.delete.submit();
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
    }
}
</script>
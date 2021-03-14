<template>
<!-- レビュー投稿用のコンポーネント -->
    <div class="c-form__row p-postReview__formRow--btn c-flex--end">
        <button @click.prevent="onSubmit()" class="c-btn p-postReview__form--btn c-btn--action2">口コミを投稿する</button>
        <v-dialog></v-dialog>
    </div>
</template>

<script>
import VModal from 'vue-js-modal';
Vue.use(VModal, {dialog: true});

export default {
    methods: {
        onSubmit(){
            //   投稿の確認
            this.$modal.show('dialog', {
                title: 'レビューの投稿',
                text: '投稿しますか？',
                buttons: [{
                    title: '投稿する',
                    handler: () => {
                       document.review.submit();
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
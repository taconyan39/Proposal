<template>
<!-- アイデア投稿用コンポーネント -->
<div>
    <form class="c-form p-ideaPost__form u-clearfix" name="form" v-if="!postIdea">

        <label for="category_id" class="p-ideaPost__label c-form__label">
            カテゴリー

            <select id="category_id" class="p-ideaPost__select c-form__input--half c-selectBox"
            name="category_id"
            v-model="category_id"
            autocomplete="category_id"
            autofocus>
                <option value=""></option>
                <option v-for="category in categories" :key="category.id" :value="category.id" class="category__type"
                v-text="category.name_ja"></option>
            </select>
            
            <div class="c-error" role="alert" v-html="errors.category_id">
            </div>
        </label>

        <label for="title" class="p-ideaPost__label c-form__label">
            アイデア名
            <input id="title" type="text" class="p-ideaPost__input c-form__input is-invalid" 
            name="title" autocomplete="title"
            v-model.trim="title"
            autofocus
            maxlength="20"
            placeholder="20文字以内で入力してください">
            <div class="c-form__countLength c-flex--between p-ideaPost__count">
                <div class="c-error" role="alert" v-html="errors.title">
                </div>
                <span>{{ title.length}}/20</span>
            </div>
        </label>

        <label for="price" class="p-ideaPost__label c-form__label">
            価格
            <div class="p-ideaList__row c-flex--start">
                <div class="p-ideaPost__price--mark ">￥</div>
                <input id="price"
                type="price"
                class="p-ideaPost__price
                c-form__input--half is-invalid" 
                name="price"
                v-model.number="price"
                autocomplete="price">
            </div>
            <div class="c-error" role="alert" v-html="errors.price">
            </div>
        </label>

        <label for="summary" class="p-ideaPost__label c-form__label">
            概要
            <textarea id="summary" type="summary" class="p-ideaPost__textarea
            c-form__textarea is-invalid" name="summary"
            v-model.trim="summary"
            autocomplete="summary"
            maxlength="200"
            placeholder="200文字以内で入力してください"
            >
            </textarea>
            <div class="p-ideaPost__count c-form__countLength  c-flex--between">
                <div      class="c-error" role="alert" v-html="errors.summary">
                </div>
                <span>{{ summary.length}}/200</span>
            </div>
        </label>

        <label for="content" class="p-ideaPost__label c-form__label">
            アイデアの詳細
            <textarea id="content" class="p-ideaPost__textarea
            c-form__textarea  is-invalid
            " name="content"
            v-model.trim="content"
            maxlength="5000"
            placeholder="5000文字以内で入力してください"
            ></textarea>
            <div class="p-ideaPost__count
            c-form__countLength  c-flex--between">
            <p class="p-ideaPost__annotation">購入が発生すると編集することができません</p>
                <span>{{content.length}}/5000</span>
            </div>                    
        </label>

        <div class="c-error" role="alert" v-html="errors.content">
        </div>


        <div class="c-flex--end p-ideaPost__btn--container">
            <button class="c-btn c-btn--action2 c-form__btn p-ideaPost__btn"
                    type="button"
                    @click="onSubmit()"
                    >
                        投稿する
            </button>
            <v-dialog></v-dialog>
        </div>

    </form>
    <!-- 投稿成功後の画面 -->
    <div v-if="postIdea" class="c-form p-ideaPost__form--posted">
        <p>記事が投稿されました</p>
        <a class="c-btn c-btn--sub" :href="url">マイページに戻る</a>
    </div>

</div>
</template>

<script>
import VModal from 'vue-js-modal';
Vue.use(VModal, {dialog: true});

export default {
    props:['categories', 'url'],
    data: function(){
      return {
          category_id: "",
          price: "",
          title: "",
          summary: "",
          content: "",
          errors:{},
          postIdea: false,
        }
    },
    methods:{
        onSubmit(){
            this.$modal.show('dialog', {
            title: 'アイデアの投稿',
            text: '投稿しますか？',
            buttons: [
                {
                title: '投稿する',
                handler: () => { 
                    // 送信データの格納
                    var params ={
                            category_id: this.category_id,
                            price: Number(this.price),
                            title: this.title,
                            summary: this.summary,
                            content: this.content,
                        }

                    this.errors = {};
                    var self = this;

                    axios.post('/post-idea', params)
                        .then(function(){
                            self.postIdea = true
                        })
                        .catch(function(error){
                            // 送信失敗時の処理
                            var errors = {};
                            for(var key in error.response.data.errors) {
                                errors[key] = error.response.data.errors[key].join('<br>');;
                            }
                            self.errors = errors;
                            self.$modal.hide('dialog');
                        });
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
        },
    }
}
</script>
<template>
<!-- テキストエリアの字数カウント用コンポーネント -->
<label for="category_id" class="p-profileEdit__label c-form__label">
    <div class="c-row">
        {{title}}
    </div>

    <textarea :id="name"
        class="p-profileEdit__name c-form__textarea"
        :name="name"
        rows="5"
        :autocomplete="name"
        :maxlength="max"
        v-model.trim="item"
        v-text="txt"
        :placeholder="placeholder">
    </textarea>

    <div class="p-ideaPost__count c-form__countLength  c-flex--end">
        <span>{{ item.length }}/{{max}}</span>
          
    </div>
</label>
</template>

<script>
export default {
    props:['title', 'oldvalue', 'max', 'name','txt', 'placeholder'],
    data: function(){
        return {
            item: (this.oldvalue) ? this.oldvalue : '',
        }
    }
}
</script>
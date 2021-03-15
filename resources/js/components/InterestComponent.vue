<template>
<!-- 気になる処理用コンポーネント -->
    <div>
        <button class="c-btn--middle c-btn--white p-interest__btn"  v-if="item.flg" @click="onChangeInterest(item.flg)">
          <span class="c-star"></span>
        気になる<br>を解除する</button>

        <button v-else class="c-btn--middle c-btn--action3 p-interest__btn" @click="onChangeInterest(item.flg)">気になる</button>
    </div>
</template>

<script>

export default {
    props:{
        id: {
            type: Number,
        },
    },
    data() {
        return {
            item: [],
        }
    },
    methods: {
        onChangeInterest(interestFlg){
            const url = '/ajax/interest/' + this.id
            const params = { flg: !interestFlg};

            axios.post(url, params)
                .then(response => {
                    this.item = response.data;
                });
        },
    },
    mounted(){
        const url = '/ajax/interest/' + this.id
            axios.get(url)
                .then((response) => {
                    this.item= response.data;
                })
    }
}
</script>
<template>
<!-- アイデアに寄せられた口コミを表示するコンポーネント -->

<!-- 口コミがある場合 -->

<div>
    <ul  class="c-list p-ideaReviews__list">

        <li v-for="item in items.data" :key="item.id" class="c-list__item--simple p-ideaReviews__item u-clearfix">

            <!-- 情報部分 -->
            <div class="p-ideaReviews__wrapper">
                <div class="p-ideaReviews__top">
                    <div class="p-ideaReviews__top--row c-flex--start">
                        <div class="c-img--outer c-img--round 
                        p-ideaReviews__userImg--outer">
                            <img class="c-img p-ideaReviews__userImg"
                            :src="img + item.user.icon_img"
                            alt="アイコンイメージ">
                        </div>
                        <div class="p-ideaReviews__top--name">
                            <span>{{item.user.name}}</span>
                        </div>
                    </div>

                    <div class="p-ideaReviews__top--row c-flex--between">
                        <div class="p-ideaReview__topBox ">
                            <time class="p-ideaReviews__date">{{ item.created_at | moment}}</time>
                        </div>

                        <div class="p-ideaReviews__topBox">
                            <span class="c-star" v-for="n in item.rating" :key="n"></span>
                        </div>
                    </div>

                </div>          

            </div>

            <div class="p-ideaReviews__review">
                <div class="p-ideaReview__review--wrapper">
                    <p class="p-ideaReviews__review--txt">{{item.review}}</p>
                </div>
            </div>
        </li>
    </ul>

    <pagination :data="items" @move-page="movePage($event)">
    </pagination>
</div>
            
</template>

<script>
import moment from 'moment';
import Pagination from './Pagination.vue';

export default {
    components: { Pagination },
    props: ['id', 'img'],
    data: function(){
        return {
          items: [],
          page: 1
        }
    },
    methods:{
        getItems(){
            const url = '/ajax/reviews/' + this.id +'?page=' + this.page;
            axios.get(url)
                .then((response) => {
                  this.items = response.data;
                });
        },
        movePage(page) {
            this.page = page //ページ番号を更新
            this.getItems();
        }
    },
    mounted(){
        this.getItems();
    },
    filters: {
        moment: function(date){
            return moment(date).format('YYYY/MM/DD');
        }
    }
}
</script>
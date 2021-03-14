<template>
<!-- ハンバーガーのメニュー表示用コンポーネント -->
  <div class="l-sp__menu">

    <ul v-if="name" class="c-list p-profileSidebar__items">

      <div class="c-card p-profileSidebar__card--sp">
        <div class="c-img--outer c-img--round c-card-top p-profileSidebar__img--outer">
          <img class="c-img p-profileSidebar__img" :src="img" alt="プロフィール画像">
        </div>

        <li class="c-list__title p-profileSidebar__item">
          <p class="c-card__name p-profileSidebar__title">{{name}}</p>
        </li>
        <li class="c-list__item-simple p-profileSidebar__item">
          <a :href="mypage" class="c-btn__sidebar c-btn__sub p-profileSidebar__btn">マイページへ</a>
        </li>
        <li class="c-list__item-simple p-profileSidebar__item">
          <a :href="profedit" class="c-btn__sidebar c-btn__sub  p-profileSidebar__btn">プロフィール変更</a>
        </li>
        <li class="c-list__item-simple p-profileSidebar__item">
          <a :href="postidea" class="c-btn__sidebar c-btn__sub p-profileSidebar__btn">アイデアを投稿する</a>
        </li>
        <li class="c-list__item-simple p-profileSidebar__item">
          <a :href="list" class="c-btn__sidebar c-btn__sub p-profileSidebar__btn">アイデアを探す</a>
        </li>
      </div>
    </ul>

    <ul v-else>
      <div class="c-card p-profileSidebar__card--sp">
        <div class="c-img--outer c-img--round c-card--top p-profileSidebar__img--outer">
          <img class="c-img p-profileSidebar__img" :src="noimg" alt="プロフィール画像">
        </div>
        <li class="c-list__item-simple p-profileSidebar__item">
          <a class="c-btn__sidebar c-btn--white p-profileSidebar__btn" :href="login">ログイン</a>
        </li>
        <li class="c-list__item-simple p-profileSidebar__item">
            <a class="c-btn__sidebar c-btn--action p-profileSidebar__btn" :href="register">登録する</a>
        </li>
        <li class="c-list__item-simple p-profileSidebar__item">
          <a :href="list" class="c-btn__sidebar c-btn--sub p-profileSidebar__btn">アイデアを探す</a>
        </li>
        <li class="p-profileSidebar__item c-flex--center">
          <a :href="howto" class="c-btn c-btn--action3 p-profileSidebar__btn">利用方法を見る</a>
        </li>
      </div>
    </ul>

  </div>
</template>

<script>
export default {
    props:['img','login','register', 'list', 'name','noimg','mypage', 'profedit', 'postidea', 'all-ideaslist', 'howto'],
}
</script>

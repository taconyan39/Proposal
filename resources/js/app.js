/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./jquery-3.5.1.min.js');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('buy-component', require('./components/BuyComponent.vue').default);
Vue.component('flash-message', require('./components/FlashMessage.vue').default);
Vue.component('hamburger-menu', require('./components/HamburgerMenu.vue').default);
Vue.component('icon-edit', require('./components/IconEdit.vue').default);
Vue.component('idea-edit-form', require('./components/IdeaEditForm.vue').default);
Vue.component('idea-post-form', require('./components/IdeaPostForm.vue').default);
Vue.component('idea-reviews', require('./components/IdeaReviews.vue').default);
Vue.component('interest-component', require('./components/InterestComponent.vue').default);
Vue.component('post-review', require('./components/PostReview.vue').default);
Vue.component('on-remove-btn', require('./components/OnRemoveBtn.vue').default);
Vue.component('profile-menu', require('./components/ProfileMenu.vue').default);
Vue.component('textarea-label', require('./components/TextareaLabel.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',

    data: function() {
      return {
        menu: false,
        editIdea: false,
      }
    }
    
});

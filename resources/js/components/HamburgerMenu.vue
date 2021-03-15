<template>
<!-- ハンバーガー用コンポーネント -->
    <div class="p-header__hamburger" @click="toggleMenu">
        <div class="c-hamburger__line p-header__hamburger--top"></div>
        <div class="c-hamburger__line p-header__hamburger--middle"></div> 
        <div class="c-hamburger__line p-header__hamburger--bottom"></div>
    </div>

</template>

<script>
export default {
    data() { 
        return{
        menu: false
    }
 },
    methods :{
        toggleMenu (){
        this.menu = !this.menu
        this.$emit("menu-click", this.menu);
        },
    },
}
</script>

<style>
.menu-enter, .menu-leave-to{
    transform: translateX( -100%);
}

.menu-enter-active, .menu-leave-active{
    transition: transform 0.5s;
}
</style>

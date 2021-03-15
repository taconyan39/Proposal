<template>
<!-- フラッシュメッセージ用コンポーネント -->
    <div class="c-flash">{{ flash }}</div>
</template>

<script>
export default({
    props: ['flash'],
    mounted() {
        var flash = document.getElementById('flash');
        setTimeout(function(){
            flash.style.display = "none"
            }, 3000);
    }
})
</script>

<template>
    <div id="addComment">
        <button class="col-xs-12 col-sm-4 link">Добавить комментарий</button>
        <form v-if="!add" action="">
            <input type="text">
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                add: false
            }
        }
    }
</script>

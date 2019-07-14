<template>
    <video controls :src="data[0].download_link"></video>
</template>

<script>
    export default {
        props: ['data'],
        created() {
            console.log(this.data)
        }
    }
</script>

<style scoped>

</style>
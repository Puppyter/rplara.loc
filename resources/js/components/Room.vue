<template >
    <div class="row row-cols-8">
        <div class="col-6">

        </div>
        <div class="col-2">
            <chat></chat>
        </div>
    </div>
</template>

<script>

export default {
    name: "room",
    props: ['room'],
    data()
    {
        return{
            show:true,
        }
    }
}
</script>

<style scoped>

</style>

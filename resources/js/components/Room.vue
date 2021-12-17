<template >
    <div class="row row-cols-8">
        <div class="col-6">
          <maap></maap>
        </div>
        <div class="col-2">
            <chat></chat>
        </div>
    </div>
</template>

<script>
import Maap from "./maap";
import Chat from "./chat";
export default {
    name: "room",
    components: {Chat, Maap},
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

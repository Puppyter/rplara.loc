<template>
    <ul>
        <li v-for="room in rooms" :key="room.id">
            <form action="roomUrl()" method="post">
                    <h3 class="text-white">{{room.name}}</h3>
                <button type="submit"
                        class="btn rounded-pill text-white"
                        style="background-color: #61892f">
                    Visit Room
                </button>
            </form>
                    <!--                <router-link :to="{name:'rooms.show', params:{room:room.slug}}" replace-->
<!--                             class="btn rounded-pill text-white"-->
<!--                             style="background-color: #61892f"-->
<!--                >-->
<!--                Visit Room-->
<!--                </router-link>-->
<!--            <router-view></router-view>-->
        </li>
    </ul>

</template>

<script>
export default {
    name: "rooms",
    props: ['rooms'],
    data: () => ({}),
    beforeRouteUpdate(to, from, next)
    {
        next()
    },
    methods: {
        get() {
            axios.get('/rooms/:room')
            .then(response => {
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            })
            .finally(()=> {

            })
        },

        roomUrl(room) {
            return 'rooms/' + room.slug;
        },
    }
}
</script>

<style scoped>
</style>

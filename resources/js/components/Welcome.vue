<template>
    <div class="container">
        <div class="row justify-content-center">
                    <div class="bg-dark text-white">Example Component</div>
            <form action="/" method="get">
                <input type="text" name="slug" :value="slug">
                <button @click="get">fsadf</button>
            </form>
            <div>
                <button @click="show = !show" class="btn rounded-pill text-white" style="background-color: #61892f">hide message</button>
                <transition name="slide-room">
                    <p style="color:white;" v-if="show">{{ name }}</p>
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["creator", 'slug'],
        mounted() {
            console.log('Component mounted.')
            console.dir(this.room)
        },
        data: () => ({
            message: 'Hi User',
            show: true,
            name: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        }),
        methods: {

            get() {
                this.loading = true;

                axios.get("/")
                    .then(response => {
                        console.log(response);
                        alert('True')
                    })
                    .catch(error => {
                        console.log(error);
                    })
                    .finally(() => {
                        this.loading = false;
                    })
            },

            reverseMessage(){
                this.room=this.room
                .split('')
                .reverse()
                .join('')
            }
        }
    }
</script>

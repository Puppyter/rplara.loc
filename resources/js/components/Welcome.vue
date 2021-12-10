<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <room :room="room.name"></room>
                        <button v-on:click="reverseMessage">Reverse message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['room'],
        mounted() {
            console.log('Component mounted.')
            console.dir(this.room)
        },
        data() {
            return {
                message: 'Hi User',
            }
        },
        methods: {
            reverseMessage(){
                this.room=this.room
                .split('')
                .reverse()
                .join('')
            }
        }
    }
</script>

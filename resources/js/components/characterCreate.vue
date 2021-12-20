<template>
    <div class="row-cols-10">
        <div class="col">
            <span>
                <p class="text-white">name:</p>
                <input type="text" name="name">
                </span>
        </div>
        <div class="col">
            <span>
                <p class="text-white">Avatar:</p>
                <input type="file">
            </span>
        </div>
        <div class="col">
            <select name="metier">
                <option selected disabled>choose class</option>
                <option v-for="metier in metiers" :value="metier">{{metier}}</option>
            </select>
        </div>
        <div class="col">
            
        </div>
        <div class="row row-cols-3">
            <div class="col">
                <p class="text-white">strength</p>
                <input type="number" v-model="attributes.strength">
            </div>
            <div class="col">
                <p class="text-white">dexterity</p>
                <input type="number" v-model="attributes.dexterity">
            </div>
            <div class="col">
                <p class="text-white">constitution</p>
                <input type="number" v-model="attributes.constitution">
            </div>
            <div class="col">
                <p class="text-white">intellect</p>
                <input type="number" v-model="attributes.intellect">
            </div>
            <div class="col">
                <p class="text-white">wisdom</p>
                <input type="number" v-model="attributes.wisdom">
            </div>
            <div class="col">
                <p class="text-white">charisma</p>
                <input type="number" v-model="attributes.charisma">
            </div>
        </div>
        <div class="col">
            <span>
               <p class="text-white">health: {{health}}</p>
                <button @click="generateHealth(attributes.constitution)">Re-roll HP</button>
            </span>
        </div>
        </div>
</template>

<script>
export default {
    name: "characterCreate",
    props: ['metiers'],
    data: () => ({
        attributes: {
            strength: 8,
            dexterity: 8,
            constitution: 8,
            intellect: 8,
            wisdom: 8,
            charisma: 8
        },
        health: '',
        counterAttributes: ''
    }),
    watch: {

    },
    methods: {
        getAttribute()
        {
          axios.get('/rooms/:room')
          .then(response =>{
          })
          .catch(error => {

          })
          .finally()
        },
        get() {
            axios.get('/rooms/:room')
                .then(response =>{
                    console.log(response)

                })
                .catch(error => {
                    console.log(error);
                })
                .finally(() => {
                })
        },
        countAttribute() {
            return 48 - this.attributes.map(attribute => attribute.value).reduce((prev, curr) => prev + curr, 0)
        },
        generateHealth(constitution) {
            this.health = Math.floor(Math.random() * 10)+ Number(constitution);
            console.log(constitution)
        }
    }
}
</script>

<style scoped>

</style>

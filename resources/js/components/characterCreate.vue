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
        <div class="row row-cols-3">
        <ul id="attributes-rendering">
            <li v-for="(value, name) in attributes" v-model="attributes">
                <div class="col">
                    <p class="text-white">{{name}}</p>
                    <input type="text" :name="name" :value="value">
                </div>
            </li>
        </ul>
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
    }),
    watch: {
      attributes(oldAttributes, newAttributes) {
        this.attributes = newAttributes;
      }
    },
    // computed: {
    //     attributes: {
    //         get() {
    //             return this.attributes;
    //         },
    //         set(attributeName,newValue) {
    //             this.attributes.attributeName = newValue;
    //         }
    //     }
    // },
    methods: {
        getAttribute()
        {
          axios.get('/rooms/:room')
          .then(response =>{
              this.attributes = response.data.attributes
          })
          .catch(error => {

          })
          .finally()
        },
        get() {
            axios.get('/rooms/:room')
                .then(response =>{
                    console.log(response)
                    this.attributes = response.data.attributes
                })
                .catch(error => {
                    console.log(error);
                })
                .finally(() => {
                })
        },
        generateHealth(constitution) {
            this.health = Math.floor(Math.random() * 10)+ constitution;
        }
    }
}
</script>

<style scoped>

</style>

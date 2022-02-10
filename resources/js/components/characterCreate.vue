<template>
    <form :action="route" enctype="multipart/form-data" method="post">
        <input type="hidden" name="_token" :value="csrf">
    <div class="row-cols-10">
        <div class="col" style="margin-bottom: 1em">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Name</span>
                <input type="text" required class="form-control" name="name" v-model="name">
            </div>
        </div>
        <div class="col" style="margin-bottom: 1em">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Avatar</label>
                <input type="file" required class="form-control" id="inputGroupFile01" name="avatar">
            </div>
        </div>
        <div class="col" style="margin-bottom: 1em">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Chose class</span>
                </div>
            <select class="form-select" required aria-label="Default select example" name="metier_name" v-model="metier">
                <option v-for="metier in metiers" :value="metier">{{ metier }}</option>
            </select>
            </div>
        </div>
        <div class="col" style="margin-bottom: 1em">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Attributes Point</span>
                </div>
                <input type="text" required class="text-white" disabled v-model="counterAttributes"  >
            </div>
        </div>
        <div class="row row-cols-3">
            <div class="col" style="margin-bottom: 1em">
                <div class="input-group-prepend">
                    <span class="input-group-text" >strength</span>
                </div>
                <input type="number" required class="form-control" name="strength" v-model="attributes.strength" min="1" max="15" @input="countAttributes">
            </div>
            <div class="col" style="margin-bottom: 1em">
                <div class="input-group-prepend">
                    <span class="input-group-text">dexterity</span>
                </div>
                <input type="number" required class="form-control" name="dexterity" v-model="attributes.dexterity" min="1" max="15" @input="countAttributes">
            </div>
            <div class="col" style="margin-bottom: 1em">
                <div class="input-group-prepend">
                    <span class="input-group-text">constitution</span>
                </div>
                <input type="number" required class="form-control" name="constitution" v-model="attributes.constitution" min="1" max="15" @input="countAttributes">
            </div>
            <div class="col" style="margin-bottom: 1em">
                <div class="input-group-prepend">
                    <span class="input-group-text">intellect</span>
                </div>
                <input type="number" required class="form-control" name="intellect" v-model="attributes.intellect" min="1" max="15" @input="countAttributes">
            </div>
            <div class="col" style="margin-bottom: 1em">
                <div class="input-group-prepend">
                    <span class="input-group-text">wisdom</span>
                </div>
                <input type="number" required class="form-control" name="wisdom" v-model="attributes.wisdom" min="1" max="15" @input="countAttributes">
            </div>
            <div class="col" style="margin-bottom: 1em">
                <div class="input-group-prepend">
                    <span class="input-group-text">charisma</span>
                </div>
                <input type="number" required class="form-control" name="charisma" v-model="attributes.charisma" min="1" max="15" @input="countAttributes">
            </div>
        </div>
        <div class="col" style="margin-bottom: 1em">
            <div class="input-group mb-3">
                <button class="btn btn-success" type="button" @click="generateHealth(attributes.constitution)">Re-roll HP</button>
                <input type="hidden" name="health" :value="health">
                <input type="text" required class="form-control" disabled :value="health">
            </div>
        </div>
        <div class="col" style="margin-bottom: 1em">
            <button @click="get" type="submit" v-if="counterAttributes >= 0" class="btn btn-success">Create Character</button>
            <button class="btn btn-secondary" disabled v-if="counterAttributes<0">Create Character</button>
        </div>
    </div>
    </form>
</template>

<script>
export default {
    name: "characterCreate",
    props: ['metiers','route'],
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
        counterAttributes: 0,
        name: '',
        metier: "",
        csrf: '',
    }),
    // watch: {
    //     counterAttributes: () => {
    //         this.counterAttributes = 48 - this.attributes.map(attribute => attribute.value).reduce((prev, curr) => prev + curr, 0)
    //     }
    // },
    methods: {
        get() {
            axios.post("http://rplara.loc/characters")
                .then(response =>{
                    response.data = this.data;

                })
                .catch(error => {
                    console.log(error);
                })
                .finally(() => {
                })
        },
        countAttributes() {
            let i = 0;
            let sum =0;
            for (i in this.attributes) {
                sum += Number(this.attributes[i]);
            }
            this.counterAttributes = 48 - Number(sum);
        },
        generateHealth(constitution) {
            this.health = Math.floor(Math.random() * 10)+ Number(constitution);
            console.log(constitution)
        }
    },
    mounted() {
        this.csrf = window.Laravel.csrfToken;
    }
}
</script>

<style scoped>

</style>

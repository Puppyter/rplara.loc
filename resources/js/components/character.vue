<template>
    <div class="card" style="width: 23rem;">
        <img class="card-img-top" :src="character.avatar">
        <div class="card-body">
            <h3 class="card-title">Name: {{character.name}}</h3>
            <h3 class="card-title">Class: {{character.metier_name}}</h3>
            <div class="row row-cols-3">
                <div class="col">
                    <p class="card-title">Strength: {{character.strength}}</p>
                </div>
                <div class="col">
                    <p class="card-title">Dexterity: {{character.dexterity}}</p>
                </div>
                <div class="col">
                    <p class="card-title">Constitution: {{character.constitution}}</p>
                </div>
                <div class="col">
                    <p class="card-title">Intellect: {{character.intellect}}</p>
                </div>
                <div class="col">
                    <p class="card-title">Wisdom: {{character.wisdom}}</p>
                </div>
                <div class="col">
                    <p class="card-title">Charisma: {{character.charisma}}</p>
                </div>
            </div>
            <div class="col">
                <h3 class="">Health: {{character.health}}</h3>
            </div>
        </div>
        </div>
</template>

<script>
export default {
    name: "character",
    props:['character']
}
</script>

<style scoped>

</style>

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import RoomEdit from "./components/RoomEdit";

require('./bootstrap');
const Room = require("./components/Room.vue");
window.Vue = require('vue').default;
// Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/Welcome.vue -> <example-component></example-component>
 */

import VueRouter from "vue-router";
import character from "./components/character";
import characterCreate from "./components/characterCreate";
import invite from "./components/invite";

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('room', require('./components/Room.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const router = new VueRouter({
//     mode: 'history',
//     base: __dirname,
//     routes: [
//         {
//             path: '/rooms/:room',
//             name: 'rooms.show',
//             component: Room
//         },
//         {
//             path: '/rooms/:room/edit',
//             name: 'roomedit',
//             component: RoomEdit
//         },
//         {
//             path: '/rooms/:room/:character/show',
//             name: 'character.show',
//             component: character
//         },
//         {
//           path: '/rooms/:room/:character/create',
//           name: 'character.create',
//           component: characterCreate
//         },
//         {
//             path: '/rooms/:room/invite',
//             name: "invite",
//             component: invite
//         }
//     ],
//     mixin() {
//         router.beforeEach((to, from, next) => {
//             next()
//         })
//     }
// })

const app = new Vue({
    el: '#app',
    // router,

    // components : {
    //
    // }
});

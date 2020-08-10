/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/* superuser puede crear superuser, administrador de micrositio y clientes */



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import VueAxios from 'vue-axios'
import axios from 'axios'

import App from './app.vue'
import Mapa from './mapa.vue'
import GoogleMap from "./components/GoogleMap.vue";

import categorias from './components/CategoriesComponent.vue'
import productos from './components/ProductsComponent.vue'
import microsites from './components/MicrositesComponent.vue'

import * as VueGoogleMaps from "vue2-google-maps";

Vue.use(VueGoogleMaps, {
  load: {
    key: "AIzaSyCeaxA8PigzhmvYSteAVU3dZS6S0h87UEI",
    libraries: "places" // necessary for places input
  }
});


const routes = [
    {
        path: '/categories',
        name: 'categorias',
        component: categorias
    },
    {
        path: '/products',
        name: 'products',
        component: productos
    },
    {
        path: '/microsites',
        name: 'microsites',
        component: microsites
    },
    {
        path: '/',
        name: 'mapa',
        component: GoogleMap
    }
]

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const router =  new VueRouter({
    mode: 'history',
    routes: routes
})

/*const app = new Vue({
    el: '#app',
    router
}).$mount('#app');*/

const app = new Vue(Vue.util.extend({router}, App)).$mount('#app');
const mapa = new Vue(Vue.util.extend({router}, Mapa)).$mount('#mapa');

//module.exports = router;
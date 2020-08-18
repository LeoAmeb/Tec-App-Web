/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './App.vue';
import App2 from './App2.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes,guestRoutes} from './routes';
import Vue from 'vue'
import * as VueGoogleMaps from "vue2-google-maps";

Vue.use(VueRouter);
Vue.use(VueAxios,axios);
Vue.use(VueGoogleMaps, {
    load: {
      key: "AIzaSyCeaxA8PigzhmvYSteAVU3dZS6S0h87UEI",
      libraries: "places" // necessary for places input
    }
  });


const router = new VueRouter({
    mode: 'history',
    routes: routes
});


const router2 = new VueRouter({
  mode: 'history',
  routes: guestRoutes
});

const app2 = new Vue({
  el:'#app2',
  router: router2,
  render:h=>h(App2),
});

const app = new Vue({
    el: '#app',
    router: router,
    render:h => h(App),
});


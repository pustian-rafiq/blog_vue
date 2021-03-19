//import bootstarp
require('./bootstrap');
//import vue js
window.Vue = require('vue').default;
//Import vue router and routes
import VueRouter from 'vue-router';
Vue.use(VueRouter);
//Import Routes
import {routes} from './routes/frontend/routes'


  //Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('home', require('./components/frontend/home.vue').default);

//Import Vuex
import Vuex from 'vuex'
Vue.use(Vuex)
//import store
import storeData from './store/store'
//import postStore from './store/poststore'
const store = new Vuex.Store(
  storeData,
//   postStore,
)
//import moment js for date formatting
import {filter} from './filter/filter'
//import mixin
import './helpers/mixin'
//Import Pagination
Vue.component('pagination', require('laravel-vue-pagination'));


Vue.component('home-master', require('./components/frontend/HomeMaster.vue').default);
Vue.component('top-header', require('./components/frontend/TopHeader.vue').default);
Vue.component('right-sidebar', require('./components/frontend/RightSidebar.vue').default);
Vue.component('home', require('./components/frontend/Home.vue').default);

const router = new VueRouter({
    routes,
    //mode: 'history'
  });

const app = new Vue({
    el: '#app',
    router,
    store
});

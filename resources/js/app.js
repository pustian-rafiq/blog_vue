

require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router';
import {routes} from './routes/routes'

Vue.use(VueRouter);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//Vue.component('home', require('./components/backend/home.vue').default);


  const router = new VueRouter({
    routes,
    mode: 'history'
  });


const app = new Vue({
    el: '#app',
    router
});

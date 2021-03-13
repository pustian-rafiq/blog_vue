
//import bootstarp
require('./bootstrap');
//import vue js
window.Vue = require('vue').default;
//Import vue router and routes
import VueRouter from 'vue-router';
Vue.use(VueRouter);
//Import Routes
import {routes} from './routes/routes'

//Import vform
import { Form, HasError, AlertError } from 'vform'
window.Form = Form
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
// import aweet alert2
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  window.Toast = Toast

  //Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('home', require('./components/backend/home.vue').default);
 //import toastr
 import toastr from 'toastr'
 window.toastr = toastr
//Import Vuex
import Vuex from 'vuex'
Vue.use(Vuex)
//import store
import storeData from './store/store'
import postStore from './store/poststore'
const store = new Vuex.Store(
  storeData,
  postStore,
)
//import moment js for date formatting
import {filter} from './filter/filter'


  const router = new VueRouter({
    routes,
    //mode: 'history'
  });


const app = new Vue({
    el: '#app',
    router,
    store
});

import Vue from 'vue'
import moment from 'moment'

Vue.filter("time",function(a){
    //for this format---	March 10th 2021, 12:15:45 pm
  // return moment(a).format('MMMM Do YYYY, h:mm:ss a');
  //for this format
  return moment().format('MMMM Do YYYY, h:mm:ss a');
})

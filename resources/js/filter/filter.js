import Vue from 'vue'
import moment from 'moment'

Vue.filter("time",function(a){
    //for this format---	March 10th 2021, 12:15:45 pm
  // return moment(a).format('MMMM Do YYYY, h:mm:ss a');
  //for this format
  return moment().format('MMMM Do YYYY, h:mm:ss a');
})
//use this filter to show fixed length of a long string
Vue.filter("subString",function(content, length){

  return content.substring(0, length);
})
//use this filter to capitalize a text
Vue.filter("capitalize",function(value){

    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
  })

<template>
<section id="content">
<div class="container">
 <div class="row"  >
     <div class="span8">
        <article>
             <!-- {{ this.$route.params.slug }} -->
            <div class="row "  >
              <div class="span8"  style="margin-bottom:10px">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><router-link  :to="`/post/${post.slug}`">{{ post.title }}</router-link></h3>
                    </div>
                   <router-link :to="`/post/${post.slug}`"><img src=" frontend/img/dummies/blog/img1.jpg" alt="" /></router-link>
                  </div>
                  <p v-html="post.content">  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#">  {{ post.created_at | time }}</a></li>
                      <li><i class="icon-user"></i><a href="#">{{ post.user.name }}</a></li>
                      <li><i class="icon-folder-open"></i><a href="#">{{ post.category.name }}</a></li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>

                  </div>
                  <br/>
             </div>

       </div>
          </article>
           <div id="pagination">
              <span class="all">Page 1 of 3</span>
              <span class="current">1</span>
              <a href="#" class="inactive">2</a>
              <a href="#" class="inactive">3</a>
            </div>
  </div>
   <right-sidebar></right-sidebar>

     </div>
   </div>
</section>
 <!--  -->
</template>

<script>
import RightSidebar from './RightSidebar.vue';
 export default{
    name: "PostDetails",
     data:function() {
         return{
             post : {},
         }
     },
     mounted(){
         this.getPostDetails();
         this.$store.dispatch("getActiveTopCategories");
     },
      watch: {


     },
     computed:{
        //  showPostDetails(){
        //      return this.$store.getters.posts;
        //      //ekhane categories er namer sathe store.js file er getters er vitore categories name same hoite hbe
        //  },
         showCategory(){
             return this.$store.getters.getActiveTopCategory;
             //ekhane categories er namer sathe store.js file er getters er vitore categories name same hoite hbe
         }


     },
     methods:{
          getPostDetails: function(){
          let get_this = this
          axios.get("/get-post-details/"+ this.$route.params.slug).then((response)=>{
              //response.data.category--- ekhane category namta hocce categoryController theke response ermaddhome pathano nam.So same name hoite hbe
                this.post = response.data.post;//using this command set the data of input field
          })
      }
     }
 }
</script>
<style>
</style>

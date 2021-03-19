<template>
<section id="content">
<div class="container">
 <div class="row"  >
     <div class="span8">

        <article>
            <div class="row "  >
              <div class="span8" v-for="(post,index) in posts.data" :key="index" style="margin-bottom:10px">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><router-link  :to="`/post/${post.slug}`">{{ post.title }}</router-link></h3>
                    </div>
                   <router-link :to="`/post/${post.slug}`"><img src=" frontend/img/dummies/blog/img1.jpg" alt="" /></router-link>
                  </div>
             <!-- Show fixed content of the post using mixin method subStrWithHtml -->
                  <p v-html="subStrWithHtml(post.content,200, '.....')">  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#">  {{ post.created_at | time }}</a></li>
                      <li><i class="icon-user"></i><a href="#"> {{ post.user.name }}</a></li>
                      <li><i class="icon-folder-open"></i><a href="#"> {{ post.category.name }}</a></li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                    <router-link :to="`/post/${post.slug}`"  class="pull-right continue ">Continue reading <i class="icon-angle-right"></i></router-link>
                  </div>
               </div>


       </div>

          </article>
 <div  >
              <pagination :data="posts" @pagination-change-page="getResults">
                  <span slot="prev-nav">&lt; Previous</span>
	               <span slot="next-nav">Next &gt;</span>
                   </pagination>
            </div>
  </div>
   <right-sidebar></right-sidebar>
    <!-- <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" type="text" class="input-medium search-query">
                  <button type="submit" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                  <li v-for="(category,index) in showCategory" :key="index"><i class="icon-angle-right"></i>
                    <router-link :to="`/category/${category.slug}`">{{ category.name }}</router-link><span> (20)</span>
                  </li>
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                  <li>
                    <img src="frontend/img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt="" />
                    <h6><a href="#">Lorem ipsum dolor sit</a></h6>
                    <p>
                      Mazim alienum appellantur eu cu ullum officiis pro pri
                    </p>
                  </li>
                  <li>
                    <a href="#"><img src="frontend/img/dummies/blog/65x65/thumb2.jpg" class="pull-left" alt="" /></a>
                    <h6><a href="#">Maiorum ponderum eum</a></h6>
                    <p>
                      Mazim alienum appellantur eu cu ullum officiis pro pri
                    </p>
                  </li>
                  <li>
                    <a href="#"><img src="frontend/img/dummies/blog/65x65/thumb3.jpg" class="pull-left" alt="" /></a>
                    <h6><a href="#">Et mei iusto dolorum</a></h6>
                    <p>
                      Mazim alienum appellantur eu cu ullum officiis pro pri
                    </p>
                  </li>
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                  <li><a href="#">Web design</a></li>
                  <li><a href="#">Trends</a></li>
                  <li><a href="#">Technology</a></li>
                  <li><a href="#">Internet</a></li>
                  <li><a href="#">Tutorial</a></li>
                  <li><a href="#">Development</a></li>
                </ul>
              </div>
            </aside>
          </div> -->
     </div>
   </div>
</section>
 <!--  -->
</template>

<script>
import RightSidebar from './RightSidebar.vue';
 export default{
    name: "Home",
     data:function() {
         return{
            posts: {}
         }
     },
     mounted(){
         this.getResults();
         //this.$store.dispatch("getAllPosts");
         this.$store.dispatch("getActiveTopCategories");
     },
      watch: {


     },
     computed:{
        //  showAllPosts(){
        //      return this.$store.getters.posts;
        //      //ekhane categories er namer sathe store.js file er getters er vitore categories name same hoite hbe
        //  },
         showCategory(){
             return this.$store.getters.getActiveTopCategory;
             //ekhane categories er namer sathe store.js file er getters er vitore categories name same hoite hbe
         },
     },

	methods: {
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get('get-all-posts?page=' + page)
				.then(response => {
					this.posts = response.data;
				});
		}
	}



 }
</script>

<style>
.continue{
    background:hsl(357, 97%, 48%);
    color:hsl(0, 29%, 97%);
    border-radius: 10px;
    padding:3px;

}
.continue:hover{
    background:hsl(256, 100%, 50%);
    color:white;
}
.bottom-article a{
    text-decoration: none;
}
</style>

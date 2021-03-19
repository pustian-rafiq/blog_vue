<template>
     <div class="span4">
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
                    <router-link :to="`/category/${category.slug}`">{{ category.name }}</router-link><span> 20</span>
                </li>

                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                  <li>
                    <img src=" frontend/img/dummies/blog/65x65/thumb1.jpg " class="pull-left" alt="" />
                    <h6><a href="#">Lorem ipsum dolor sit</a></h6>
                    <p>
                      Mazim alienum appellantur eu cu ullum officiis pro pri
                    </p>
                  </li>
                  <li>
                    <a href="#"><img src=" frontend/img/dummies/blog/65x65/thumb2.jpg " class="pull-left" alt="" /></a>
                    <h6><a href="#">Maiorum ponderum eum</a></h6>
                    <p>
                      Mazim alienum appellantur eu cu ullum officiis pro pri
                    </p>
                  </li>
                  <li>
                    <a href="#"><img src=" frontend/img/dummies/blog/65x65/thumb3.jpg " class="pull-left" alt="" /></a>
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
          </div>
</template>

<script>


export default {
 name: "RightSidebar",
     data:function() {
         return{

         }
     },
     mounted(){
         this.$store.dispatch("getActiveTopCategories");

     },
     watch: {

     },
     computed:{
         showCategory(){
             return this.$store.getters.getActiveTopCategory;
             //ekhane categories er namer sathe store.js file er getters er vitore categories name same hoite hbe
         },
          getCount(category){
            //   let get_this = this
            //   axios.get("/edit-post/"+ this.$route.params.slug).then((response)=>{
            //   //response.data.category--- ekhane category namta hocce categoryController theke response ermaddhome pathano nam.So same name hoite hbe
            //     get_this.form.fill(response.data.post);//using this command set the data of input field
             return this.$store.getters.countCategory;

         }

     },
     methods: {
        //  getCount(){
        //       let get_this = this
        //       axios.get("/edit-post/"+ this.$route.params.slug).then((response)=>{
        //       //response.data.category--- ekhane category namta hocce categoryController theke response ermaddhome pathano nam.So same name hoite hbe
        //         get_this.form.fill(response.data.post);//using this command set the data of input field
        //   })
        //  }
     }
}
</script>

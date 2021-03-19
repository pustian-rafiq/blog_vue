<template>
    <div>
      <div class="container">


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>


          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Post List</h3>
                <router-link to="/create-post" class="btn btn-sm btn-info float-right">Add New Post</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th>
                          <input   :disabled="emptyData()" type="checkbox" @click="selectAll"  v-model="selectedAll">
                    </th>
                    <th>SL NO.</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Content</th>
                    <th>Thumbnail</th>
                    <th>Create By</th>
                    <th>Status</th>

                    <th style="width: 130px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                     <tr v-for="(post,index) in showPost" :key="index">
                        <td>
                          <input type="checkbox" :value="post.id"  v-model="selected">
                        </td>
                        <td>{{++index}}</td>
                        <!-- this filter method subString is used for showing fied character -->
                        <!-- <td>{{ category.name | subString(2)}}</td> -->
                        <td>{{ post.title }}</td>
                        <td>{{ post.category.name | subString(15) }}</td>
                        <!-- <td>{{ post.content | subString(25)}}</td> -->
                        <!-- use v-html for discard html tag when display data -->
                        <td> <p v-html="subStrWithHtml(post.content,200, '.....')">  </p> </td>
                         <!-- <p v-html="subStrWithHtml(post.content,200, '.....')">  </p> -->
                        <!-- <td><img width="80px" :src="filename(post.thumbnail)"></td> -->
                        <td><img width="80px" :src="post.thumbnail"></td>
                        <td>{{post.user.name}}</td>
                        <td  v-if="post.status=='draft'"><span class="badge badge-danger">Draft</span></td>
                        <td v-else-if="post.status=='published'"><span class="badge badge-success">Published</span></td>
                        <td>
                            <router-link :to="`/edit-post/${post.slug}`" class="btn btn-sm btn-success" >Edit</router-link>
                            <button class="btn btn-sm btn-danger" @click="removePost(post.slug)">Delete</button>
                        </td>
                    </tr>
            <!-- emptyData likhe hbena,,must be emptyData() dite hbe -->
                             <tr v-if="emptyData()">
                                    <td colspan="12">
                                        <h5 class="text-center text-danger" > Data Not Found!</h5>
                                    </td>
                                </tr>
                                 <tr v-if="!emptyData()">
                                    <td colspan="12">
                                          <div class="dropdown">
                                            <button :disabled="!isSelected" class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><button type="button" @click="removeItems(selected)" class="dropdown-item" >Remove All</button></li>
                                                <li><button type="button" @click="changeStatus(selected, 'published')" class="dropdown-item" >Published</button></li>
                                                <li><button type="button" @click="changeStatus(selected, 'draft')" class="dropdown-item" >Draft</button></li>
                                             <!--removeItems er vitor selected data property k parameter hisabe dite hbe  -->
                                        </ul>
                                      </div>
                                    </td>
                                </tr>




                  </tbody>
                  <!-- <tfoot>
                    <tr>
                    <th>SL NO.</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Content</th>
                    <th>Thumbnail</th>
                    <th>Create By</th>
                    <th>Status</th>

                    <th>Action</th>

                    </tr>
                  </tfoot> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>

    </section>

      </div>
    <!-- /.content -->
    </div>
</template>

<script>
 export default{
     name: "Index",
     data:function() {
         return{
             selected: [],
             selectedAll: false,
             isSelected: false,
         }
     },
     mounted(){
         this.$store.dispatch("getPosts");
     },
      watch: {
         selected: function(selected){ //ei function name must be selected array er name hoite hbe
             this.selectedAll = (selected.length === this.showPost.length);
             this.isSelected = (selected.length > 0); //return true
         }
     },
     computed:{
         showPost(){
             return this.$store.getters.posts;
             //ekhane categories er namer sathe store.js file er getters er vitore categories name same hoite hbe
         }

     },
     methods: {
         removePost: function(slug){
                 this.confirm(()=>{


                      axios.get("remove-post/"+slug).then((response)=>{
                   //call dispatch method to return index page and show remaining data without any loading
                        this.$store.dispatch("getPosts");
                            Swal.fire(
                                'Deleted!',
                                'Your Post has been deleted.',
                                'success'
                                )
                        }).catch((error)=>{

                    })



        });


     },
         emptyData: function(){
           return (this.showPost.length < 1);//Short form conditional Statement--- 1 theke soto hoile true return korbe
             //console.log(this.showCategory);
         },
         selectAll: function(event){
             if(event.target.checked === false){
                 this.selected= [];
                 //console.log("test");
             }else{
                 this.showPost.forEach((post)=>{
                     if(this.selected.indexOf(post.id) === -1 ){
                          this.selected.push(post.id);

                     }

                 });
             }
         },
           //This function delete the selected category
         removeItems: function(selected){
                 this.confirm(()=>{
             axios.post("/posts/remove-items",{dataForController: selected}).then((response)=>{
                   //This three data property is nulled after deleteing category..jno delete er por action button ta unchecked hoia jai
                  this.selected= [],
                  this.selectedAll= false,
                  this.isSelected= false,
                  this.$store.dispatch("getPosts"); //it is called for showing category index page after deleting data
                  toastr.success(response.data.total+' Post has been successfully deleted.');
             }).catch((error)=>{

             })
          });
         },
           //This function change the status of the category
          changeStatus: function(selected, status){
                let msg = status === 'published'? "published" : "draft";
             axios.post("/posts/change-status",{dataForController: selected, status: status}).then((response)=>{
                  this.selected= [],
                  this.selectedAll= false,
                  this.isSelected= false,
                  this.$store.dispatch("getPosts"); //it is called for showing category index page after deleting data
                  toastr.success(response.data.total + ' Category has been successfully '+ msg);
             }).catch((error)=>{

             })
         },
         //To show image from our local folder
         filename:function(name){
             return 'uploads/posts/'+name;
         }
     }
 }
</script>

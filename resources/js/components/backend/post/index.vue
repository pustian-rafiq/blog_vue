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

        <div class="card card-grey">
              <div class="card-header">
                <h3 class="card-title">Post List</h3>
                <router-link to="/create-post" class="btn btn-sm btn-info float-right">Add New Post</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <!-- <th>
                          <input type="checkbox">
                      </th> -->
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
                         <!-- <td>
                          <input type="checkbox" :value="category.id" v-model="categoryIds">
                      </td> -->
                        <td>{{++index}}</td>
                       <!-- this filter method subString is used for showing fied character -->
                       <td>{{ post.title  }}</td>

                         <td>{{ post.category.name  }}</td>
                        <td>{{ post.content | subString(40) }}</td>
                        <td><img width="60px" :src="post.thumbnail"></td>
                       <td>{{ post.user.name }}</td>
                        <td  v-if="post.status=='draft'"><span class="badge badge-success">{{ post.status | capitalize }}</span></td>
                        <td v-if="post.status=='published'"><span class="badge badge-danger">{{ post.status | capitalize }}</span></td>

                        <td >
                           <router-link :to="`/edit-category/${post.slug}`" class="btn btn-sm btn-success"  title="Edit" ><i class="fas fa-edit"></i></router-link>
                            <button class="btn btn-sm btn-danger" @click="removePost(post.slug)" title="Delete"><i class="fas fa-trash" ></i></button>
                        </td>

                    </tr>

                  </tbody>
                  <tfoot>
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
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
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
            postIds: []
         }
     },
     mounted(){
         this.$store.dispatch("getPosts");
     },
     computed:{
         showPost(){
             return this.$store.getters.posts;
             //ekhane categories er namer sathe store.js file er getters er vitore categories name same hoite hbe
         }

     },
     methods: {
         removePost: function(slug){
//Category delete using sweet alert
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
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

                    }
                    })


             //Here toastr message alert is used
            //     axios.get("remove-category/"+id).then((response)=>{
            //        //call dispatch method to return index page and show remaining data without any loading
            //        this.$store.dispatch("getCategories");
            //       toastr.success('Category deleted successfully!',{timeout: 5000});
            //     }).catch((error)=>{

            //   })
         }
     }
 }
</script>

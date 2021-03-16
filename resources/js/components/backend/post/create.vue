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
              <li class="breadcrumb-item active">Create Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="row">
          <!-- left column -->
        <div class="col-md-12 col-offset-2">
         <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add New Post</h3>
                 <router-link to="/posts" class="btn btn-sm btn-info float-right">Posts List</router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="addPost" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                       <select  class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }"  v-model="form.category_id">
                           <option value="">Select a category</option>
                           <option  :value="category.id" v-for="(category,index) in showCategory" :key="index"> {{ category.name }}</option>
                       </select>
                        <has-error :form="form"  field="category_id"></has-error>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title Name</label>
                    <div class="col-sm-10">
                      <input :class="{ 'is-invalid': form.errors.has('title') }" placeholder="Enter post title"  type="text" class="form-control" id="inputEmail3" name="title"  v-model="form.title">
                        <has-error :form="form" field="title"></has-error>
                    </div>
                  </div>

                 <div class="form-group row">
                    <label for="content" class="col-sm-2 col-form-label">Post Content</label>
                    <div class="col-sm-10">
                              <ckeditor v-model="form.content" :config="editorConfig"></ckeditor>
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="thumbnail" class="col-sm-2 col-form-label">Post Thumbnail</label>
                    <div class="col-sm-10">
                        <!-- customize input file -->
                             <input hidden type="file" id="upload" name="thumbnail" @change="loadThumbnail($event)">
                             <label id="label" for="upload">Upload your post thumbnail</label>
                             <img :src="form.thumbnail" width="80px">
                    </div>
                </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Status</label>
                   <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" id="inlineCheckbox1" value="draft" name="status" v-model="form.status">
                       <label class="form-check-label" for="inlineCheckbox1">Draft</label>
                    </div>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" id="inlineCheckbox1" name="status" value="published" v-model="form.status">
                       <label class="form-check-label" for="inlineCheckbox1">Published</label>
                    </div>
                    <span :class="{ 'is-invalid': form.errors.has('status') }"></span>
                    <has-error :form="form" field="status"></has-error>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" :disabled="form.busy" class="btn btn-info">Add Post</button>
                  <button type="reset" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
          </div>            <!-- /.card -->
            </section>

      </div>
    <!-- /.content -->
    </div>
</template>

<script>

 export default{
  name: "create",
  data(){
      return{
          form: new Form({
              title: null,
              category_id: '',
              content: null,
              thumbnail:null,
              status: null
          }),

               // editorData: '<p>Content of the editor.</p>',
                editorConfig: {
                    // The configuration of the editor.
                }
      }
  },
   mounted(){
         this.$store.dispatch("getActiveCategories");
        // this getActiveCategories goes to action prperty of the store.js file with the same name
     },
      computed:{
         showCategory(){
             return this.$store.getters.categories;
             //ekhane categories er namer sathe store.js file er getters er vitore categories name same hoite hbe
         }

     },
  methods: {
      addPost: function(){
          let test = this
          this.form.post('/create-post')
                .then((response) => {
                     console.log(response.data);
                    //Show alert using Toastr
                    toastr.success('Post has been added successfully!',{timeout: 5000});
                   //After adding a category we reset our input box
                   test.form.category_id = '';
                   test.form.title = null;
                   test.form.content = '';
                   test.form.status = null;
                   test.form.thumbnail = null;

                }).catch((error)=>{

                });
      },
     //Loadthumbnail method goes to mixin file
  }
 }
</script>
<style scoped>
#label{
  display: inline-block;
  background-color: #050207c2;
  color: white;
  padding: 0.5rem 1rem;
  font-family: sans-serif;
  border-radius: 0.3rem;
  cursor: pointer;
  margin-top: 5px;
  font-family: sans-serif;
}
</style>

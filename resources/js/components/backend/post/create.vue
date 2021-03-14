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
              <div class="col-md-6">
         <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add New Post</h3>
                 <router-link to="/categories" class="btn btn-sm btn-info float-right">Post List</router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="addCategory">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Category Name</label>
                    <div class="col-sm-8">
                      <input :class="{ 'is-invalid': form.errors.has('name') }"  type="text" class="form-control" id="inputEmail3" name="name" placeholder="Enter category name" v-model="form.name">
                        <has-error :form="form" field="name"></has-error>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Status</label>
                   <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" id="inlineCheckbox1" value="1" name="status" v-model="form.status">
                       <label class="form-check-label" for="inlineCheckbox1">Active</label>

                    </div>


                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" id="inlineCheckbox1" name="status" value="0" v-model="form.status">
                       <label class="form-check-label" for="inlineCheckbox1">Inactive</label>
                    </div>
                    <span :class="{ 'is-invalid': form.errors.has('status') }"></span>
                    <has-error :form="form" field="status"></has-error>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" :disabled="form.busy" class="btn btn-info">Add Category</button>
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
              name: null,
              status: null
          })
      }
  },
  methods: {
      addCategory: function(){
          let test = this
          this.form.post('/create-category')
                .then(function(response){
                    //Show alert using sweet alert2
                    // if(response){
                    //       Toast.fire({
                    //       icon: 'success',
                    //       title: 'Category added successfully'
                    // })
                    // }else{
                    //       Toast.fire({
                    //       icon: 'error',
                    //       title: 'Category added successfully'
                    // })
                    // }
                    //this is used for redirecting category index page after adding a category
                   // test.$router.push("/categories");


                    //Show alert using Toastr
                    toastr.success('Category added successfully!',{timeout: 5000});
                   //After adding a category we reset our input box
                   test.form.name = null;
                   test.form.status = null;

                });
      }
  }
 }
</script>

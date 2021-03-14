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
              <li class="breadcrumb-item active">Edit Category</li>
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
                <h3 class="card-title">Edit Category</h3>
                 <router-link to="/categories" class="btn btn-sm btn-info float-right">Back</router-link>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="updateCategory">
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
                  <button type="submit" :disabled="form.busy" class="btn btn-info">Update Category</button>
                  <button type="reset" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div> <!-- /.card -->
              </div>
          </div>

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
              id: null,
              name: null,
              status: null
          })
      }
  },
  mounted(){
      this.getCategory();
  },
  methods: {
      updateCategory: function(){
          let get_this = this;
          this.form.post('/update-category')
                .then((response)=>{
                      //Show alert using Toastr
                    toastr.success('Category updated successfully!',{timeout: 3000});
                    get_this.$router.push("/categories");

                });
      },
      getCategory: function(){
          let get_this = this
          axios.get("/edit-category/"+ this.$route.params.slug).then((response)=>{
              //response.data.category--- ekhane category namta hocce categoryController theke response ermaddhome pathano nam.So same name hoite hbe
                get_this.form.fill(response.data.category);//using this command set the data of input field
          })
      }
  }
 }
</script>

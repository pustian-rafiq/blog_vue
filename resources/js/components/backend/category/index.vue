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
              <li class="breadcrumb-item active">Category Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-grey">
              <div class="card-header">
                <h3 class="card-title">Category List</h3>
                <router-link to="/create-category" class="btn btn-sm btn-info float-right">Add New Category</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL NO.</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                     <tr v-for="(category,index) in showCategory" :key="index">
                        <td>{{++index}}</td>
                        <td>{{ category.name }}</td>
                        <td  v-if="category.status==1"><span class="badge badge-success">Active</span></td>
                        <td v-else-if="category.status==0"><span class="badge badge-danger">Inactive</span></td>
                         <td>{{ category.created_at | time }}</td>
                        <td>
                            <router-link to="/edit-category" class="btn btn-sm btn-success" >Edit</router-link>
                            <button class="btn btn-sm btn-danger" @click="removeCategory(category.id)">Delete</button>
                        </td>

                    </tr>

                  </tbody>
                  <tfoot>
                    <tr>
                        <th>SL NO.</th>
                        <th>Category Name</th>
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
     mounted(){
         this.$store.dispatch("getCategories");
     },
     computed:{
         showCategory(){
             return this.$store.getters.categories;
             //ekhane categories er namer sathe store.js file er getters er vitore categories name same hoite hbe
         }

     },
     methods: {
         removeCategory: function(id){
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
                      axios.get("remove-category/"+id).then((response)=>{
                   //call dispatch method to return index page and show remaining data without any loading
                        this.$store.dispatch("getCategories");
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
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

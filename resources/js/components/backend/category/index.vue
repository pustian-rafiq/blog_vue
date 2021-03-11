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
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet</td>
                    <td>Active</td>
                    <td>Edit</td>
                 
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
     
 }
</script>
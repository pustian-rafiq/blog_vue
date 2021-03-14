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


        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category List</h3>
                <router-link to="/create-category" class="btn btn-sm btn-info float-right">Add New Category</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>
                          <input  :disabled="emptyData()" type="checkbox" @click="selectAll"  v-model="selectedAll">
                        </th>
                      <th style="width: 10px">Sl No</th>
                      <th>Category Name</th>
                      <th>Slug Name</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th style="width: 130px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <tr v-for="(category,index) in showCategory" :key="index">
                        <td>
                          <input type="checkbox" :value="category.id"  v-model="selected">
                        </td>
                        <td>{{++index}}</td>
                        <!-- this filter method subString is used for showing fied character -->
                        <!-- <td>{{ category.name | subString(2)}}</td> -->
                        <td>{{ category.name  }}</td>
                        <td>{{ category.slug }}</td>
                        <td  v-if="category.status==1"><span class="badge badge-success">Active</span></td>
                        <td v-else-if="category.status==0"><span class="badge badge-danger">Inactive</span></td>
                         <td>{{ category.created_at | time }}</td>
                        <td>
                            <router-link :to="`/edit-category/${category.slug}`" class="btn btn-sm btn-success" >Edit</router-link>
                            <button class="btn btn-sm btn-danger" @click="removeCategory(category.slug)">Delete</button>
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
                                                <li><button type="button" @click="changeStatus(selected, 1)" class="dropdown-item" >Active</button></li>
                                                <li><button type="button" @click="changeStatus(selected, 0)" class="dropdown-item" >Inactive</button></li>
                                             <!--removeItems er vitor selected data property k parameter hisabe dite hbe  -->
                                        </ul>
                                      </div>
                                    </td>
                                </tr>

                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
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
         this.$store.dispatch("getCategories");
        // this.emptyData();
     },
     watch: {
         selected: function(selected){ //ei function name must be selected array er name hoite hbe
             this.selectedAll = (selected.length === this.showCategory.length);
             this.isSelected = (selected.length > 0); //return true
         }
     },
     computed:{
         showCategory(){
             return this.$store.getters.categories;
             //ekhane categories er namer sathe store.js file er getters er vitore categories name same hoite hbe
         }

     },
     methods: {
         removeCategory: function(slug){
//Category delete using sweet alert
                this.confirm(()=>{
                     axios.get("remove-category/"+slug).then((response)=>{
               //call dispatch method to return index page and show remaining data without any loading
                    this.$store.dispatch("getCategories");
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                    }).catch((error)=>{

                })
             });

         },
         emptyData: function(){
           return (this.showCategory.length < 1);//Short form conditional Statement--- 1 theke soto hoile true return korbe
             //console.log(this.showCategory);
         },
         selectAll: function(event){
             if(event.target.checked === false){
                 this.selected= [];
                 //console.log("test");
             }else{
                 this.showCategory.forEach((category)=>{
                     if(this.selected.indexOf(category.id) === -1 ){
                          this.selected.push(category.id);

                     }

                 });
             }
         },
           //This function delete the selected category
         removeItems: function(selected){
                 this.confirm(()=>{
             axios.post("/categories/remove-items",{dataForController: selected}).then((response)=>{
                   //This three data property is nulled after deleteing category..jno delete er por action button ta unchecked hoia jai
                  this.selected= [],
                  this.selectedAll= false,
                  this.isSelected= false,
                  this.$store.dispatch("getCategories"); //it is called for showing category index page after deleting data
                  toastr.success(response.data.total+' Category has been successfully deleted.');
             }).catch((error)=>{

             })
          });
         },
           //This function change the status of the category
          changeStatus: function(selected, status){
                let msg = status === 1? "active" : "Inactive";
             axios.post("/categories/change-status",{dataForController: selected, status: status}).then((response)=>{
                  this.selected= [],
                  this.selectedAll= false,
                  this.isSelected= false,
                  this.$store.dispatch("getCategories"); //it is called for showing category index page after deleting data
                  toastr.success(response.data.total + ' Category has been successfully '+ msg);
             }).catch((error)=>{

             })
         }
     }
 }
</script>

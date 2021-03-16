import Vue from 'vue'

Vue.mixin({
    methods:{
        confirm: function(callback){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed)  callback();//call this function to the removeCategory function in index page
        })
    },
    loadThumbnail: function(e){
        let file = e.target.files[0];
        console.log(file.type);
        if(file.type === 'image/png' || file.type === 'image/jpg'){
              let fileReader = new FileReader();
              fileReader.onload= e=>{
                  this.form.thumbnail = e.target.result;
              }
              fileReader.readAsDataURL(file);

        }else{
               //Show alert using Toastr
                  toastr.error('Image must be png/jpg format!',{timeout: 5000});
        }

    }
}

});

export default{
    state: {

        fetchCategory: [],
        fetchPost: []
      },
      getters: {
        categories(state){
            return state.fetchCategory;
        },
        posts(state){
            return state.fetchPost;
        }
      },

      actions: {
        getCategories(data){
            axios.get("get-categories").then((response)=>{
                data.commit("fetchCategories",response.data.categories)
            }).catch((error)=>{

            })
        },
        getPosts(data){
            axios.get("get-posts").then((response)=>{
                data.commit("fetchPosts",response.data.posts)//ekhaner posts hoilo Postcontroller er index er posts variable
            }).catch((error)=>{

            })
        }
      },
      mutations: {
        fetchCategories(state, data){
            return state.fetchCategory = data;
        },
        fetchPosts(state, data){
            return state.fetchPost = data;
        }
      }
}

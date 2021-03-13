export default{
    state: {

        fetchPost: []
      },
      getters: {
        posts(state){
            return state.fetchPost;
        }
      },
      actions: {
        getPosts(data){
            axios.get("get-posts").then((response)=>{
                data.commit("fetchPosts",response.data.posts)
            }).catch((error)=>{

            })
        }
      },
      mutations: {
        fetchPosts(state, data){
            return state.fetchPost = data;
        }
      }
}

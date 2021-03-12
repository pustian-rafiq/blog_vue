export default{
    state: {

        fetchCategory: []
      },
      getters: {
        categories(state){
            return state.fetchCategory;
        }
      },
      actions: {
        getCategories(data){
            axios.get("get-categories").then((response)=>{
                data.commit("fetchCategories",response.data.categories)
            }).catch((error)=>{

            })
        }
      },
      mutations: {
        fetchCategories(state, data){
            return state.fetchCategory = data;
        }
      }
}

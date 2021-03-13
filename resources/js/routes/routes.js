import Home from '../components/backend/home'

//categories routes here
import CategoryIndex from '../components/backend/category/index'
import CreateCategory from '../components/backend/category/create'
import editCategory from '../components/backend/category/edit'
//posts routes here
import PostIndex from '../components/backend/post/index'
import CreatePost from '../components/backend/post/create'
import editPost from '../components/backend/post/edit'

export const routes = [
    { path: '/home', component: Home },
    { path: '/categories', component: CategoryIndex },
    { path: '/create-category', component: CreateCategory },
    { path: '/edit-category/:slug', component: editCategory },
    //post path here
    { path: '/posts', component: PostIndex },
    { path: '/create-post', component: CreatePost },
    { path: '/edit-post/:slug', component: editPost },
  ]

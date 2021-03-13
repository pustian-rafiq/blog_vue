import Home from '../components/backend/home'

//categories routes here
import IndexPage from '../components/backend/category/index'
import CreateCategory from '../components/backend/category/create'
import editCategory from '../components/backend/category/edit'


export const routes = [
    { path: '/home', component: Home },
    { path: '/categories', component: IndexPage },
    { path: '/create-category', component: CreateCategory },
    { path: '/edit-category/:slug', component: editCategory },
  ]

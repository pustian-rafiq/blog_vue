

//Frontend routes here
import HomePage from '../../components/frontend/Home'
import AboutPage from '../../components/frontend/About'
import CategoryPost from '../../components/frontend/CategoryPosts'
import PostDetails from '../../components/frontend/PostDetails'


export const routes = [

     //Frontend path here
     { path: '/', component: HomePage },
     { path: '/about', component: AboutPage },
     { path: '/category/:slug', component: CategoryPost },
     { path: '/post/:slug', component: PostDetails },
  ]

import { createRouter, createWebHistory } from 'vue-router'
import Admin from '../views/Admin.vue'
import Sign_up from '../views/Sign_up.vue'
import Sign_in from '../views/Sign_in.vue'
import Profile from '../views/Profile.vue'
import Rendez from '../views/Rendez.vue'



const routes = [
  {
    path: '/Admin',
    name: 'Admin',
    component: Admin
  },
  {
    path: '/sign_up',
    name: 'sign_up',
    component: Sign_up
  },
  {
    path: '/sign_in',
    name: 'sign_in',
    component: Sign_in
  },
  {
    path: '/Profile',
    name: 'Profile',
    component: Profile
  },  
  {
    path: '/Rendez',
    name: 'Rendez',
    component: Rendez
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

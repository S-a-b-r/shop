import {createRouter, createWebHistory} from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/client/',
      name: 'main.index',
      component: () => import('../views/main/Index.vue')
    },
    {
      path: '/client/products',
      name: 'main.products',
      component: () => import('../views/product/Index.vue')
    },
    {
      path: '/client/brewery/:id',
      name: 'brewery.show',
      component: () => import('../views/brewery/BreweryShowComponent.vue')
    },
    {
      path: '/client/registration',
      name: 'main.registration',
      component: () => import('../views/auth/Registration.vue')
    },
    {
      path: '/client/login',
      name: 'main.login',
      component: () => import('../views/auth/Login.vue')
    },
    {
      path: '/client/profile',
      name: 'main.profile',
      component: () => import('../views/Profile.vue')
    },
    {
      path: '/client/aboutUs',
      name: 'main.aboutUs',
      component: () => import('../views/AboutUs.vue')
    }
  ]
})

router.beforeEach((to, from, next)=> {
  const token = localStorage.getItem('x_xsrf_token');

  if(token){
    if(to.name === 'main.login' || to.name === 'main.registration'){
      return next({ name: 'main.profile'});
    }
  }
  if(!token){
    if(to.name === 'main.profile'){
      return next({ name: 'main.login'})
    }
  }

  next();
})

export default router

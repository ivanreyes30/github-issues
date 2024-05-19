import { createRouter, createWebHistory } from 'vue-router'
import GuardService from '@/services/guard'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    // {
    //   path: '/',
    //   name: 'home',
    //   component: HomeView,
    //   beforeEnter: (to, from, next) => (GuardService.authorized(to, from, next))
    // },
    // {
    //   path: '/about',
    //   name: 'about',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: () => import('../views/AboutView.vue')
    // }
    {
      path: '/:pathMatch(.*)*',
      name: 'ErrorView',
      beforeEnter: (to, from, next) => (GuardService.authorized(to, from, next)),
      component: () => import('../views/ErrorView.vue')
    },
    {
      path: '/',
      name: 'IssueView',
      component: () => import('../views/IssueView.vue'),
      beforeEnter: (to, from, next) => (GuardService.authorized(to, from, next))
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})

export default router

import { createRouter, createWebHistory } from 'vue-router'
import GuardService from '@/services/guard'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/default',
      name: 'DefaultLayout',
      component: () => import('../layouts/DefaultLayout.vue'),
      redirect: '/error-page',
      children: [
        {
          path: '/:pathMatch(.*)*',
          name: 'ErrorView',
          component: () => import('../views/ErrorView.vue')
        }
      ]
    },
    {
      path: '/',
      name: 'ViewLayout',
      component: () => import('../layouts/ViewLayout.vue'),
      redirect: '/issue',
      children: [
        {
          path: '/issue',
          name: 'IssueView',
          component: () => import('../views/IssueView.vue'),
          beforeEnter: (to, from, next) => (GuardService.authorized(to, from, next)),
        },
        {
          path: '/issue/:id',
          name: 'IssueDetailsView',
          component: () => import('../views/IssueDetailsView.vue'),
          beforeEnter: (to, from, next) => (GuardService.authorized(to, from, next)),
        },
        {
          path: '/about',
          name: 'about',
          component: () => import('../views/AboutView.vue')
        }
        
      ]
    }
  ]
})

export default router

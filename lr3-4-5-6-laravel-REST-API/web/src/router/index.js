import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '@/views/LoginView.vue'
import ShelfView from '@/views/ShelfView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: ShelfView
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/shelf/:id',
      name: 'shelf',
      component: ShelfView
    },
  ]
})

export default router

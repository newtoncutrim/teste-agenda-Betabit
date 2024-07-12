import { createRouter, createWebHistory } from 'vue-router'
import EditTarefa from '@/views/Todos/EditTarefa.vue'
import Login from '@/views/Todos/Login.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'todo.login',
      component: Login
    },
    {
      path: '/register',
      name: 'todo.register',
      component: Login
    },
    {
      path: '/tarefas',
      name: 'todo.index',
      component: () => import('@/views/Todos/Tarefas.vue')
    },
    {
      path: '/todo/create',
      name: 'todo.create',
      component: () => import('@/views/Todos/AddTarefa.vue')
    },
    {
      path: '/todo/:id/edit',
      name: 'todo.edit',
      props: true,
      component: EditTarefa
/*       component: () => import('@/views/Todos/EditTarefa.vue') */
    },
  ]
})

export default router

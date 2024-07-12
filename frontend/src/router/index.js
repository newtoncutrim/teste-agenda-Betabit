import { createRouter, createWebHistory } from 'vue-router'
import EditTarefa from '@/views/Todos/EditTarefa.vue'
import Login from '@/views/Todos/Login.vue';
import AddTarefa from '@/views/Todos/AddTarefa.vue';
import Tarefas from '@/views/Todos/Tarefas.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login.index',
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
      component: Tarefas
    },
    {
      path: '/todo/create',
      name: 'todo.create',
      component: AddTarefa
    },
    {
      path: '/todo/:id/edit',
      name: 'todo.edit',
      props: true,
      component: EditTarefa
    },
  ]
})

export default router

import { createRouter, createWebHistory } from 'vue-router';
import Login from '../views/Login.vue';
import Tarefas from '@/views/Todos/Tarefas.vue';
import EditTarefa from '@/views/Todos/EditTarefa.vue';
import AddTarefa from '@/views/Todos/AddTarefa.vue';


const routes = [
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/todo',
    name: 'todo',
    component: Tarefas
  },
  {
    path: '/todo/:id/edit',
    name: 'todo.edit',
    component: EditTarefa
  },
  {
    path: '/todo/create',
    name: 'todo.create',
    component: AddTarefa
  },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
});

export default router;

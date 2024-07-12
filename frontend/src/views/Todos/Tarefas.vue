<template>
  <section class="container">
    <table
      class="table project-list-table table-nowrap align-middle table-borderless"
    >
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Endereço</th>
          <th scope="col">Email</th>
          <th scope="col">Telefone</th>
          <th scope="col" style="width: 200px">Ação</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="todo in todos" :key="todo.id">
          <td>
            <a href="#" class="text-body">{{ todo.name }}</a>
          </td>
          <td>
            <span class="badge badge-soft-success mb-0">{{
              todo.address
            }}</span>
          </td>
          <td>{{ todo.email }}</td>
          <td>{{ todo.telephone }}</td>
          <td>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <router-link
                  :to="{
                    name: 'todo.edit',
                    params: { id: todo.id ? todo.id : '' },
                  }"
                >
                  <a
                    href="javascript:void(0);"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Edit"
                    class="px-2 text-primary"
                    ><i class="bx bx-pencil font-size-18"></i
                  ></a>
                </router-link>
              </li>
              <li class="list-inline-item">
                <a
                  @click.prevent="deleteTarefa(todo.id)"
                  href="javascript:void(0);"
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  title="Delete"
                  class="px-2 text-danger"
                  ><i class="bx bx-trash-alt font-size-18"></i
                ></a>
              </li>
            </ul>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="btn-group">
      <router-link
        :to="{
          name: 'todo.create',
        }"
      >
        <a href="javascript:void(0);" class="btn">Criar Tarefa</a>
      </router-link>
    </div>
  </section>
</template>

<script>
import { ref } from "vue";
import TodoService from "@/services/todo-services";
import { onMounted } from "vue";

export default {
  name: "Tarefas",
  setup() {
    const todos = ref([]);
    const loading = ref(false);

    onMounted(() => {
      loading.value = true;
      TodoService.getAll()
        .then((response) => {
          // console.log(response.data);
          todos.value = response.data;
        })
        .catch((error) => console.log(error))
        .finally(() => {
          loading.value = false;
        });
    });

    const deleteTarefa = (id) => {
      if (confirm("Deseja realmente excluir essa tarefa?")) {
        TodoService.destroy(id).then(() => {
          window.location.reload();
        });
      }
    };

    return {
      todos,
      loading,
      deleteTarefa,
    };
  },
};
</script>

<style scoped>
.container {
  max-width: 90%;
  margin: 0 auto;
  padding: 20px;
}

.table {
  width: 100%;
  margin: 0 auto;
  text-align: center;
}

.table th,
.table td {
  text-align: center;
  vertical-align: middle;
}

.table thead th {
  border-bottom: 2px solid #dee2e6;
  background-color: #f8f9fa;
}

.table tbody tr:hover {
  background-color: #f1f3f5;
}

.table a {
  text-decoration: none;
}

.table .text-primary {
  color: #007bff;
}

.table .text-danger {
  color: #dc3545;
}

.table .badge-soft-success {
  background-color: #e2f0d9;
  color: #28a745;
}

.list-inline-item {
  margin-right: 10px;
}
.btn-group {
  display: flex;
  align-items: center;
  justify-content: end;
  margin: 0 auto;
  margin-top: 20px;
}
</style>

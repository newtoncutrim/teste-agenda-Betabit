<script setup>
import { RouterLink, RouterView } from 'vue-router'

</script>

<template>
  <header>

    <div class="wrapper">
      <nav >
        <div v-if="isLogin">
          <RouterLink to="/">Home</RouterLink>
          <router-link :to="{name: 'todo.create'}">Adicionar Tarefa</router-link>
        </div>
        <div v-else>
          <router-link :to="{name: 'todo.create'}">Adicionar Tarefa</router-link>
        </div>
      </nav>
    </div>
  </header>

  <RouterView />
</template>
<script>
import { ref, watchEffect } from 'vue';
export default {
  setup() {
    const isLogin = ref(Boolean(localStorage.getItem('token')));

    watchEffect(() => {
      isLogin.value = Boolean(localStorage.getItem('token'));
    });

    return {
      isLogin
    };
  }
}

</script>
<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 18px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

/* @media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
} */
</style>
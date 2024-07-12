<template>
   <header>
    <div class="app">
      <Header>
        <nav>
          <router-link to="/">Home</router-link>
          <router-link class="btn" to="/tarefas">Tarefas</router-link>
        </nav>
      </Header>
    </div>
  </header>
</template>
<script>
export default {
    name: 'TheHeader',
}
</script>
<style scoped>

nav {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 15px 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
    
</style>
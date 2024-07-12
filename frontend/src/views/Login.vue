<template>
  <section class="login">
    <h1>{{ isLogin ? "Login" : "Registrar" }}</h1>
    <form @submit.prevent="isLogin ? login() : register()">
      <label for="email">E-mail</label>
      <input type="text" name="email" id="email" v-model="email" />

      <label for="password">Senha</label>
      <input
        type="password"
        name="password"
        id="password"
        v-model="password"
      />

      <div v-if="!isLogin">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" v-model="name" />
      </div>

      <button class="btn" type="submit">
        {{ isLogin ? "Logar" : "Registrar" }}
      </button>
    </form>

    <p class="link-container">
      <button @click.prevent="toggleLoginMode">
        {{ isLogin ? "Cadastrar" : "Fazer Login" }}
      </button>
    </p>
  </section>
</template>

<script>
import TodoService from "@/services/todo-services";
import router from "@/router";

export default {
  name: "Auth",
  data() {
    return {
      email: "",
      password: "",
      name: "",
      isLogin: true,
    };
  },
  methods: {
    async login() {
      try {
        const config = {
          headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Headers":
              "Origin, X-Requested-With, Content-Type, Accept",
            "Access-Control-Allow-Methods": "PUT, POST, GET, DELETE, OPTIONS",
            "Content-Type": "application/json",
          },
        };

        const response = await TodoService.login(
          {
            email: this.email,
            password: this.password,
          },
          config
        );

        console.log("Token:", response.data.token);

        router.push({ name: "todo" });
      } catch (error) {
        console.error("Erro no login:", error);
      }
    },

    async register() {
      try {
        const config = {
          headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Headers":
              "Origin, X-Requested-With, Content-Type, Accept",
            "Access-Control-Allow-Methods": "PUT, POST, GET, DELETE, OPTIONS",
            "Content-Type": "application/json",
          },
        };

        const response = await TodoService.register(
          {
            email: this.email,
            password: this.password,
            name: this.name,
          },
          config
        );
        console.log("Token:", response.data);

        router.push({ name: "login" });
      } catch (error) {
        console.error("Erro no cadastro:", error);
      }
    },
    toggleLoginMode() {
      this.isLogin = !this.isLogin;
    },
  },
};
</script>

<style scoped>
.login {
  max-width: 500px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  margin: 0 auto;
  padding: 20px;
}
.link-container {
  margin-top: 20px;
}
</style>

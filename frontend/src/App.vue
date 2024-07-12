<template>
  <div id="app">
    <!-- <TheHeader /> -->
    <router-view />
  </div>
</template>
<script>
import TheHeader from "@/Components/TheHeader.vue";
export default {
  name: "App",
  components: {
    TheHeader,
  },
};
</script>
<style>
* {
  box-sizing: border-box;
  
}

body,
ul,
li,
h1,
h2,
p {
  margin: 0px;
  padding: 0px;
  list-style: none;
  font-family: Arial, Helvetica, sans-serif;
  background: #eee;
}

a {
  color: #345;
  list-style: none;
}
.btn {
  display: block;
  padding: 10px 30px;
  background: #87f;
  color: #345;
  border-radius: 4px;
  text-align: center;
  text-decoration: none;
  font-size: 1rem;
  font-weight: 600;
  transition: 0.1s ease-out;
  font-family: Arial, Helvetica, sans-serif;
  border: none;
  cursor: pointer;
}

.btn:hover {
  background: #65d;
  color: #fff;
  transform: scale(1.1);
}

input,
textarea {
  width: 100%;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 15px;
  border: none;
  outline: none;
  border-radius: 4px;
  font-size: 1rem;
  transition: all 0.3s;
  margin-bottom: 15px;
}

</style>

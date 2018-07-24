<template>
  <div>
    email: <input v-model="email"/><br>
    password: <input v-model="password" type="password"/><br>
    <button @click="login">Login</button>
  </div>
</template>

<script>
export default {
  data: () => ({
    email: null,
    password: null
  }),
  methods: {
    login() {
      this.$axios.post('auth/login', {
        email: this.email,
        password: this.password
      }).then(response => {
        localStorage.setItem("api_token", response.data.api_token);
      })
    }
  }
}
</script>

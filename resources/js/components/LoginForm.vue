<template>
  <form class="inner px-5 pt-5" method="post" action="/login" @submit.prevent="login">
    <div class="row gtr-uniform px-4">
      <div class="col-6 col-12-xsmall">
        <h4>Email</h4>
        <input v-model="email"
          type="email"
          name="email"
          id="email"
          
          placeholder="..."
        />
      </div>
      <div class="col-6 col-12-xsmall">
        <h4>Password</h4>
        <input
        v-model="password"
          type="password"
          name="password"
          id="password"
          
          placeholder="..."
        />
      </div>
      <div class="col-12">
        
            <app-button btntype="primary" type="submit">Login</app-button>
         
      </div>
    </div>
  </form>
</template>

<script>
import apiClient from "../src/services/api.js";

export default {
  data() {
    return {
      email: null,
      password: null,
      loading: false,
    };
  },
  methods: {
    async login() {
      this.loading = true; // can use this to triggle a :disabled on login button
      this.errors = null;

      try {
        await apiClient.get("/sanctum/csrf-cookie");
        await apiClient.post("/login", {
          email: this.email,
          password: this.password,
        });
      console.log("Email:" + email.value);
      console.log("Password:" + password.value)
        // Do something amazing
      } catch (error) {
        this.errors = error.response && error.response.data.errors;
        console.log(error.response);
      }

      this.loading = false;
    },
  },
};
</script>
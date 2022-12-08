<template>
  <main class="overflow-hidden ">
    <!--Start Breadcrumb Style2-->
    <section class="breadcrumb-area" style="background-image: url(/assets/images/Rectangle5.png);">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="breadcrumb-content text-center wow fadeInUp animated">
              <h2>Login</h2>
              <div class="breadcrumb-menu">
                <ul>
                  <li>
                    <router-link :to="{name: 'main.index'}"><i class="flaticon-home pe-2"></i>Home</router-link>
                  </li>
                  <li><i class="flaticon-next"></i></li>
                  <li class="active">Login</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Breadcrumb Style2-->
    <!--Start Login Page-->
    <section class="login-page pt-120 pb-120 wow fadeInUp animated">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8 col-md-9">
            <div class="login-register-form"
                 style="background-image: url('/assets/images/inner-pages/login-bg.png');">
              <div class="top-title text-center ">
                <h2>Login</h2>
                <p>Don't have an account yet?
                  <router-link :to="{name:'main.registration'}">Sign up for free</router-link>
                </p>
              </div>
              <form class="common-form">
                <div class="form-group">
                  <input v-model="email" type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <input v-model="password" type="password" id="password-field" class="form-control"
                         placeholder="Password">
                </div>
                <div class="checkk ">
                  <div class="form-check p-0 m-0">
                    <input type="checkbox" id="remember">
                    <label class="p-0" for="remember"> Remember Me</label>
                  </div>
                </div>
                <button @click.prevent="login()" type="submit" class="btn--primary style2">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Login Page-->
  </main>

</template>

<script>
import axios from "axios";

axios.defaults.withCredentials = true;

export default {
  name: "LoginView",

  data() {
    return {
      email: null,
      password: null
    }
  },

  methods: {
    login() {
      const config = {
        headers: {
          "Content-Type": "application/json",
          'Accept': "application/json",
        },
      }
      axios.get('http://shop/sanctum/csrf-cookie', config).then(response => {
        axios.post('http://shop/login', {email: this.email, password: this.password}, config).then(res => {
          localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
          this.$router.push({name: 'main.index'})
        }).catch(err => {
          alert(err.response.data.message)
        })
      })
    }
  }
}
</script>

<style scoped>

</style>

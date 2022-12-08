<template>
  <main class="overflow-hidden ">
    <!--Start Breadcrumb Style2-->
    <section class="breadcrumb-area" style="background-image: url(/assets/images/Rectangle4.png);">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="breadcrumb-content text-center wow fadeInUp animated">
              <h2>Registration</h2>
              <div class="breadcrumb-menu">
                <ul>
                  <li>
                    <router-link to="/"><i class="flaticon-home pe-2"></i>Home</router-link>
                  </li>
                  <li><i class="flaticon-next"></i></li>
                  <li class="active">Registration</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Breadcrumb Style2-->
    <!--Start Login Page-->
    <section class="login-page pt-120 pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8 col-md-9 wow fadeInUp animated">
            <div class="login-register-form"
                 style="background-image: url('/assets/images/inner-pages/login-bg.png');">
              <div class="top-title text-center ">
                <h2>Register</h2>
                <p>Already have an account?
                  <router-link to="/login">Log in</router-link>
                </p>
              </div>
              <form class="common-form">
                <div class="form-group">
                  <input v-model="name" type="text" class="form-control" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input v-model="email" type="email" class="form-control" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <input v-model="password" type="password" id="password-field" class="form-control"
                         placeholder="Password">
                </div>
                <div class="form-group">
                  <input v-model="password_confirmation" type="password" class="form-control"
                         placeholder="Confirm password">
                </div>
                <div class="form-group">
                  <input v-model="age" type="number" class="form-control" placeholder="Age">
                </div>
                <button @click.prevent="register()" class="btn--primary style2">Register</button>
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

export default {
  name: "Registration",

  methods: {
    register(){
      const config = {
        headers: {
          "Content-Type": "application/json",
          'Accept': "application/json",
        },
      }
      axios.get('http://shop/sanctum/csrf-cookie', config).then(response => {
        axios.post('/register', {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
          age: this.age
        })
        .then(res=>{
          localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
          this.$router.push({name: 'main.index'});
          console.log(res);
        })
        .catch(err=>{
          alert(err.response.data.message)
        })
      })
    }
  },

  data() {
    return {
      name: null,
      email: null,
      password: null,
      password_confirmation: null,
      age: null
    }
  }
}
</script>

<style scoped>

</style>

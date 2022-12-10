<template>
  <main class="overflow-hidden">
    <!--Start Breadcrumb Style2-->
    <section class="breadcrumb-area" style="background-image: url(/assets/images/profile.png);">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="breadcrumb-content text-center wow fadeInUp animated">
              <h2>My Account </h2>
              <div class="breadcrumb-menu">
                <ul>
                  <li>
                    <router-link :to="{name: 'main.index'}"><i class="flaticon-home pe-2"></i>Home</router-link>
                  </li>
                  <li><i class="flaticon-next"></i></li>
                  <li class="active">My Account</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Breadcrumb Style2-->
    <!--Start My Account Page-->
    <section class="my-account-page pt-120 pb-120">
      <div class="container">
        <div class="row wow fadeInUp animated">
          <!--Start My Account Page Menu-->
          <div class="col-xl-3 col-lg-4">
            <div class="d-flex align-items-start">
              <div class="nav my-account-page__menu flex-column nav-pills me-3" id="v-pills-tab"
                   role="tablist" aria-orientation="vertical">
                <button class="nav-link active"
                        id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard"
                        type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
                  <span> Dashboard</span></button>
                <button class="nav-link" id="v-pills-orders-tab"
                        data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab"
                        aria-controls="v-pills-orders" aria-selected="false"><span> Orders</span></button>
                <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-address" type="button" role="tab"
                        aria-controls="v-pills-address" aria-selected="false"><span> Address</span>
                </button>
                <button class="nav-link" id="v-pills-account-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-account" type="button" role="tab"
                        aria-controls="v-pills-account" aria-selected="false"><span> Account Details</span>
                </button>
                <a @click.prevent="logout()" class="nav-link" href="#"><span> Logout </span></a>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="tab-content " id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                   aria-labelledby="v-pills-dashboard-tab">
                <div class="tabs-content__single">
                  <h4><span>Hello, {{surname +" "+ name+" "+patronymic}}</span></h4>
                  <span>Это твой личный кабинет, здесь ты можешь изменить некоторые параметры о себе, например, пол (мы прогресиивны),
                  возраст (как бы ни хотелось его признавать), имя, фамилию, отчество, матчество и так далее...</span>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-orders" role="tabpanel"
                   aria-labelledby="v-pills-orders-tab">
                <div class="tabs-content__single">
                  <h4><span>Hello Admin</span> (Not Admin? Logout)</h4>
                  <h5>From your account dashboard you can view your <span>Recent Orders, manage your
                                            shipping</span> and <span>billing addresses,</span> and edit your
                    <span>Password and account details</span></h5>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-address" role="tabpanel"
                   aria-labelledby="v-pills-address-tab">
                <div class="tabs-content__single">
                  <h4><span>Address</span></h4>
                  <span>По нашей информации ваш адрес:
                    <input class="col-10 my-2" type="text" v-model="address" placeholder="Enter your address">
                    <br>
                    Но если нет, можете поменять его)
                  </span>
                  <button @click.prevent="updateAddress()" class="btn--primary style2" style="margin: 0 auto;">Save Address</button>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-account" role="tabpanel"
                   aria-labelledby="v-pills-account-tab">
                <div class="tabs-content__single">
                  <h4><span>Account Details</span> <span v-if="is_admin">(Your role is Admin)</span></h4>
                  <div class=" col-10 p-4" style="background: url('/assets/images/inner-pages/login-bg.png') center/cover no-repeat;">
                    <div class="my-2 d-flex align-items-center justify-content-between">
                      <span>Name:</span>
                      <input class="col-10" type="text" v-model="name" placeholder="Print your name">
                    </div>
                    <div class="my-2 col-12 d-flex align-items-center justify-content-between">
                      <span>Surname:</span>
                      <input class="col-10" type="text" v-model="surname" placeholder="Print your surname">
                    </div>
                    <div class="my-2 col-12 d-flex align-items-center justify-content-between">
                      <span>Patronymic:</span>
                      <input class="col-10" type="text" v-model="patronymic" placeholder="Print your patronymic">
                    </div>
                    <div class="my-2 col-12 d-flex align-items-center justify-content-between">
                      <span>Age:</span>
                      <input class="col-10" type="number" v-model="age" placeholder="Print your age">
                    </div>
                    <div class="my-2 col-3 d-flex align-items-center justify-content-between">
                      <span>Gender:</span>
                      <div>
                        <div class="d-flex my-2">
                          <input class="col-10" type="radio" id="radioGenderMale" v-model="gender" value="1">
                          <label for="radioGenderMale">Male</label>
                        </div>
                        <div class="d-flex">
                          <input class="col-10" type="radio" id="radioGenderFemale" v-model="gender" value="0">
                          <label for="radioGenderFemale">Female</label>
                        </div>
                      </div>
                    </div>
                    <button @click.prevent="updateProfile()" class="btn--primary style2" style="margin: 0 auto;">Save</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <strong class="me-auto">{{status}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
          </div>
          <div class="toast-body">
            {{message}}
          </div>
        </div>
      </div>

    </section>
    <!--End My Account Page-->
  </main>

</template>

<script>

export default {
  name: "Profile",
  mounted() {
    this.getProfile();
    this.toastLiveExample = document.getElementById('liveToast');
    this.toast = new bootstrap.Toast(this.toastLiveExample);
  },
  methods: {
    updateAddress(){
      axios.post('http://shop/api/profile/address', {address : this.address}).then(result=>{
        this.status = 'Success';
        this.message = 'Address was successfully update';
        this.toast.show()
      }).catch(err=>{
        this.status = 'Error';
        this.message = err.response.data['message'];
      })
    },
    updateProfile(){
      const data = {
        name : this.name,
        surname : this.surname,
        patronymic : this.patronymic??"",
        email : this.email,
        gender : this.gender??0,
        age: this.age
      }
      axios.post('http://shop/api/profile/update', data).then(result=>{
        this.status = 'Success'
        this.message = 'Информация была успешно обновлена'
        this.toast.show()
      }).catch(err=>{
        this.status = 'Error'
        this.message = err.response.data['message']
        this.toast.show()
      })
    },
    getProfile() {
      axios.post('http://shop/api/profile').then(result=>{
        let data = result.data.data;
        this.name = data.name;
        this.surname = data.surname??"";
        this.patronymic = data.patronymic??"";
        this.email = data.email;
        this.is_admin = data.is_admin;
        this.gender = data.gender??0;
        this.address = data.address;
        this.age = data.age;
      })
    },
    logout(){
      axios.post('/logout').then(result=>{
        if(this.token){
          localStorage.removeItem('x_xsrf_token')
        }
        this.$router.push({name: 'main.login'})
      }).catch(err=>{
        alert(err.response.data.message)
      })
    }
  },
  data(){
    return {
      toastLiveExample : null,
      toast : null,
      name: "",
      surname: null,
      email: null,
      patronymic: null,
      age: null,
      address: null,
      gender: null,
      is_admin: null,
      message: null,
      status: null,
    }
  }
}
</script>

<style scoped>

</style>

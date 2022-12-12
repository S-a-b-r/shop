<template>
  <!-- header-default start -->
  <header class="header-style-3">
    <!-- Start Desktop Menu -->
    <div class="menubox">
      <div class="container-fluid">
        <div class="row d-lg-none d-block">
          <div class="mobile-menu ">
            <div class="mobile-menu__menu-top border-bottom-0">
              <div class="container">
                <div class="row">
                  <div class="menu-info d-flex justify-content-between align-items-center">
                    <div class="menubar"><span></span> <span></span> <span></span></div>
                    <a href="/" class="logo">
                        <img src="/assets/images/logo/logo-mini.png" alt="">
                    </a>
                  <div class="cart-holder">
                      <router-link :to="{name: 'main.cart'}" class="cart cart-icon position-relative">
                        <i class="flaticon-shopping-cart"></i>
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="menu-closer"></div>
            <div class="mobile-menu__sidebar-menu">
              <div class="menu-closer two"><span> Close Menu</span><a href="#"><span class="cross"><i
                  class="flaticon-cross"></i></span></a></div>
              <ul class="page-dropdown-menu">
                <li class="dropdown-list"><router-link :to="{ name: 'main.index'}"> <span>Главная </span> </router-link></li>
                <li class="dropdown-list"><router-link :to="{ name: 'main.products'}"> <span>Продукты </span> </router-link></li>
                <li class="dropdown-list"><router-link :to="{name:'main.aboutUs'}"><span>О нас</span></router-link></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="container col-12">
          <div class="row">
            <div class="d-lg-block d-none">
          <div class="row g-0 position-relative">
            <div class="col-lg-2 d-flex align-items-center justify-content-start border-rit">
              <div class="logo">
                <router-link :to="{name: 'main.index'}">
                  <img src="/assets/images/logo/logo-mini.png" alt="">
                </router-link>
              </div>
            </div>
            <div class="col-lg-10 g-0 p-0">
              <div class="row g-0 holder">
                <div class="col-12">
                  <div class="some-info d-flex justify-content-end">
                    <div>
                      <router-link v-if="!token" :to="{name: 'main.login'}" class="mx-2"> LogIn </router-link>
                      <a v-if="token" @click.prevent="logout()" href="#">Logout</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-one"></div>
              <div class="row g-0 holder">
                <div class="col-12">
                  <div class="mega-menu-default mega-menu d-lg-block d-none">
                    <div class=" d-flex align-items-center justify-content-between ">
                      <nav>
                        <ul class="page-dropdown-menu d-flex align-items-center justify-content-center">
                          <li class="dropdown-list"><router-link :to="{name: 'main.index'}"> <span>Главная</span> </router-link></li>
                          <li class="dropdown-list"><router-link :to="{name: 'main.products'}"> <span>Продукты</span> </router-link></li>
                          <li class="dropdown-list"><router-link :to="{name:'main.aboutUs'}"><span>О нас</span></router-link></li>
                        </ul>
                      </nav>


                      <div class="right d-flex align-items-center justify-content-end">
                        <ul class="main-menu__widge-box d-flex align-items-center ">
                          <li v-if="token" class="d-lg-block d-none"><router-link :to="{name: 'main.profile'}"><i
                              class="flaticon-user"></i> </router-link></li>
                          <li class="cartm">
                            <router-link :to="{name: 'main.cart'}" class="number cart-icon">
                              <i class="flaticon-shopping-cart"></i>
                            </router-link>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>


    <div class="sticy-header">
      <div class="mobile-menu d-lg-none d-block">
        <div class="mobile-menu__menu-top border-bottom-0">
          <div class="container">
            <div class="row">
              <div class="menu-info d-flex justify-content-between align-items-center">
                  <router-link :to="{name: 'main.index'}" class="logo"> <img src="/assets/images/logo/logo-mini.png" alt=""> </router-link>
                <div class="cart-holder">
                  <router-link :to="{name: 'main.cart'}" class="cart cart-icon position-relative">
                    <i class="flaticon-shopping-cart"></i>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container position-relative d-lg-block d-none">
        <div class="d-flex align-items-center justify-content-between">
          <router-link :to="{name:'main.index'}" class="logo me-2">
          <img src="/assets/images/logo/logo-mini.png" alt=""> </router-link>
          <div class="mega-menu-default mega-menu d-lg-block d-none">
            <div class="container col-12">
              <div class="row">
                <nav>
                  <ul class="page-dropdown-menu d-flex align-items-center justify-content-center">
                    <li class="dropdown-list">
                      <router-link :to="{name: 'main.index'}"><span>Главная</span></router-link>
                    </li>
                    <li class="dropdown-list">
                      <router-link :to="{name: 'main.products'}"><span>Продукты</span></router-link>
                    </li>
                    <li class="dropdown-list">
                      <router-link :to="{name:'main.aboutUs'}"><span>О нас</span></router-link>
                    </li>
                  </ul>
                </nav>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="sidebar-content-closer"></div>
  </header>

  <router-view :key="$route.fullPath"></router-view>

  <!--  Footer Three start -->
  <footer class="footer-default footer-3 ">
    <div class="footer-default__shap_1 position-absolute "><img src="/assets/images/shape/footer-shape-1.png"
                                                                alt=""></div>
    <!--Start Footer-->
    <div class="footer-default__main-footer position-relative">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
            <div class="footer-default__single-box">
              <div class="company-info">
                <div class="footer-title">
                  <h4> Адреса</h4>
                </div>
                <div class="text1">
                  <a href="https://go.2gis.com/2yb6g" target="_blank"><p>Пушкинская улица, 185</p></a>
                </div>
                <div class="text2">
                  <a href="https://go.2gis.com/fb30dz" target="_blank"><p>Пушкинская улица, 268</p></a>
                </div>
                <div class="text3">
                  <a href="https://go.2gis.com/iasm6" target="_blank"><p>Максима Горького, 76</p></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
            <div class="footer-default__single-box">
              <div class="footer-title">
                <h4> Популярные ссылки</h4>
              </div>
              <ul class="footer-links">
                <li><router-link :to="{name: 'main.profile'}">Профиль</router-link></li>
                <li><router-link :to="{name: 'main.login'}">Авторизация</router-link></li>
                <li><router-link :to="{name: 'main.cart'}">Корзина</router-link></li>
                <li><router-link :to="{name: 'main.products'}">Товары</router-link></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
            <div class="footer-default__single-box">
              <div class="footer-title">
                <h4> Информация </h4>
              </div>
              <ul class="footer-links">
                <li><router-link :to="{name:'main.aboutUs'}">About us</router-link></li>
                <li><a href="contact.html">Contact Us </a></li>
                <li><a href="faq.html">Faq</a></li>
                <li><a href="blog.html">Latest Posts</a></li>
                <li><a href="order-track.html">Order Track</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
            <div class="footer-default__single-box">
              <div class="footer-title">
                <h4> Наши соцсети </h4>
              </div>
              <div class="footer-newsletter">
                <div class="newsletter-bottom d-flex align-items-center">
                  <ul>
                    <li><a href="https://t.me/vareniebar">Telegram</a></li>
                    <li><a href="https://vk.com/vareniebar">VK</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- footer-bottom Footer-->
    <div class="footer_bottom position-relative">
      <div class="container">
        <div class="footer_bottom_content">
          <div class="copyright wow fadeInUp animated">
            <p>© 2022 <router-link :to="{name:'main.index'}">Varenie</router-link> All Rights Reserved.</p>
          </div>
          <div class="footer-payment wow fadeInUp animated">
            <img src="/assets/images/home-four/method-1.jpg" alt="payment">
            <img src="/assets/images/home-four/method-2.jpg" alt="payment">
            <img src="/assets/images/home-four/method-3.jpg" alt="payment">
            <img src="/assets/images/home-four/method-4.jpg" alt="payment">
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "App",

  updated() {
    this.getToken();
  },

  mounted(){
    $(document).trigger('changed');
    this.getToken();
  },

  methods:{
    getToken(){
      this.token = localStorage.getItem('x_xsrf_token');
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
    return {token:null};
  }
}
</script>

<style>

</style>

<template>
  <main class="overflow-hidden">
    <!-- Start Main Slider -->
    <section class="banner-style-3 overflow-hidden">
      <!-- Banner Carousel -->
      <div class="banner-slide3 slick" data-slick='{"dots": true, "infinite": true, "speed": 600, "slidesToShow": 1,
                "slidesToScroll": 1, "arrows": false, "autoplay": true, "autoplaySpeed": 10000,
                 "fade": false, "pauseOnHover": false}'>

        <!-- Slide -->
        <div class="slide">
          <div class="contant-box position-relative">

            <img class="bg-img hundread-vh" src="/assets/images/Frame%204.png" alt="image">

            <div class="content-holder p-0 absolute-content">
              <div class="container  w-100 h-100">
                <div class="row align-items-center justify-content-start w-100 h-100">
                  <div class="col-xl-6 col-md-9">
                    <div class="content-common home3c slideup position-relative">
                      <h6 class="new wow animated fadeInUp">NEW COLLECTION</h6>
                      <h1 class="wow animated fadeInUp" data-wow-delay="0.4s" style="color:white; font-family: 'Montserrat Alternates', sans-serif">
                        Встречайте<br>  имперские стауты пивоварни alaska
                      </h1>
                      <p class="text wow animated fadeInUp" style="color:white">
                        Вы просили, мы исполнили. Теперь новые имперские стауты будут ждать вас в наших фирменных магазинах
                      </p>
                      <router-link to="/products" class="btn--primary button style2 wow animated fadeInUp">
                        To products
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Slide -->
        <div class="slide">
          <div class="contant-box position-relative">


            <img class="bg-img hundread-vh" src="/assets/images/frame6.png" alt="image">

            <div class="content-holder p-0 absolute-content">
              <div class="container w-100 h-100">
                <div class="row align-items-center justify-content-start w-100 h-100">
                  <div class="col-xl-6 col-md-9">
                    <div class="content-common slidedown home3c position-relative text-start">
                      <h6 class="new wow animated fadeInUp">HAPPY NEW YEAR</h6>
                      <h1 class="wow animated fadeInUp" data-wow-delay="0.4s" style="color:white; font-family: 'Montserrat Alternates', sans-serif">
                        Новый год <br> в баре Варение
                      </h1>
                      <p class="new text wow animated fadeInUp" style="color:white">
                        Хочешь провести новый год в отличной компании? Приходи в новогоднюю ночь к нам, мы будем
                        работать до утра!!!
                      </p>
                      <a href="shop-grid.html"
                         class="btn--primary button style2 wow animated fadeInUp">To products</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Main Slider -->
  </main>
</template>

<script>
export default {
  name: "Index",
  mounted(){
    $(document).trigger('changed')
  }
}
</script>

<style scoped>

</style>

<template>
  <main class="overflow-hidden">
    <!--Start Breadcrumb Style2-->
    <section class="breadcrumb-area" style="background-image: url(/assets/images/inner-pages/about-back.png);">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="breadcrumb-content text-center wow fadeInUp animated">
              <h2>About Us</h2>
              <div class="breadcrumb-menu">
                <ul>
                  <li><router-link :to="{name: 'main.index'}"><i class="flaticon-home pe-2"></i>Home</router-link></li>
                  <li> <i class="flaticon-next"></i> </li>
                  <li class="active">About Us</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Breadcrumb Style2-->
    <!--Start About One-->
    <section class="about pt-120 pb-120">
      <div class="container">
        <div
          class="row g-0 about__background align-items-center justify-content-lg-between justify-content-center">
          <!--Start About One Img-->
          <div class="col-lg-5 col-10 wow fadeInLeft animated ">
            <div class="about__img">
              <div class="about__img-inner"> <img src="/assets/images/inner-pages/about-us.png"
                                                  alt="" /> </div>
            </div>
          </div>
          <!--End About One Img-->
          <!--Start About One Content-->
          <div class="col-lg-7 col-md-11 ">
            <div class="about__content text-center">
              <div class="shape1"><img src="/assets/images/shape/about-v1-shape1.png" alt="" /></div>
              <div class="shape2"><img src="/assets/images/shape/about-v1-shape2.png" alt="" /></div>
              <div class="title wow fadeInUp animated">
                <h6>Our Company</h6>
                <h2>The Highest Quality <br>Products</h2>
              </div>
              <div class="text wow fadeInUp animated">
                <p> "Варение" - это не просто бар, это самое большое собрание крафтового пива во всей Удмуртии.
                  У нас есть 2 бара и 1 батлшоп! Мы покупаем пиво почти у всех пивоварен страны, и если сегодня ты не
                  нашел своего любимого пива в баре, не переживай, оно обязательно появится!
                </p>
              </div>
            </div>
          </div>
          <!--End About One Content-->
        </div>
      </div>
    </section>
    <!--End About One-->
    <!--Start Mission One-->
    <section class="mission">
      <div class="shape1"><img src="/assets/images/shape/mission-v1-shape1.png" alt="" /></div>
      <div class="shape2"><img src="/assets/images/shape/mission-v1-shape2.png" alt="" /></div>
      <div class="auto-container container mission__background pt-120 pb-120">
        <div class="container">
          <div class="row mt--30 align-items-center justify-content-center">
            <!--Start Mission One Content-->
            <div class="col-lg-6 col-md-10 mt-30">
              <div class="mission__content text-lg-start text-center">
                <h2 class=" wow fadeInUp animated">Our Mission</h2>
                <p class=" wow fadeInUp animated">Крафт - это невообразимое количество разных вкусовых ощущений.
                  С нами ты окунешься в новый неизведанный мир крафтового пива, и мы будем в нем проводниками. Наши бармены
                проведут тебе настоящую экскурсию, раскажут о пиве все от А до Я и научат, как пить пиво!</p>
              </div>
            </div>
            <!--End Mission One Content-->
            <!--Start Mission One Img-->
            <div class="col-lg-6 mt-30">
              <div class="mission__thumb wow fadeInRight animated"> <img
                src="/assets/images/inner-pages/jason.png" alt="" />
                <div class="content-box">
                  <div class="icon"> <i class="flaticon-quote"></i> </div>
                  <h3 style="font-family: 'Montserrat Alternates', sans-serif;">Тут внатуре четкое пиво разливают</h3>
                  <div class="author-box">
                    <h5 style="font-family: 'Montserrat Alternates', sans-serif;">Д. Стетхем <span> Актер </span> </h5>
                  </div>
                </div>
              </div>
            </div>
            <!--End Mission One Img-->
          </div>
        </div>
      </div>
    </section>
    <!--End Mission One-->
  </main>
</template>

<script>
export default {
  name: "AboutUs"
}
</script>

<style scoped>

</style>

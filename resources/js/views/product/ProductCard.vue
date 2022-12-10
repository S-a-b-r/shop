<template>
  <div class="col-xl-4 col-lg-6 col-6 ">
    <div class="products-three-single w-100  mt-30">
      <div class="products-three-single-img">
        <a :href="`#popup${product.id}`" class="popup_link d-block">
          <img :src=product.image_url class="first-img" alt=""/>
          <img :src=product.image_url alt="" class="hover-img" style="opacity: 0.5;"/>
        </a>
        <div v-for="tag in product.tags" class="products-grid-one__badge-box">
          <span class="bg_base badge new ">{{ tag.title }}</span>
        </div>
        <a href="cart.html" class="addcart btn--primary style2">
          Добавить в корзину
        </a>
      </div>
      <div :id="`popup${product.id}`" class="product-gird__quick-view-popup mfp-hide">
        <div class="container">
          <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
              <div class="quick-view__left-content">
                <div class="tabs">
                  <div class="popup-product-thumb-box">
                    <ul>
                      <li class="tab-nav popup-product-thumb ">
                        <a href="#tabb11">
                          <img :src="product.image_url" alt=""/>
                        </a>
                      </li>
                      <li v-if="product.images.length > 0" class="tab-nav popup-product-thumb">
                        <a href="#tabb22">
                          <img :src="product.images[0].url" alt=""/>
                        </a>
                      </li>
                      <li v-if="product.images.length > 1" class="tab-nav popup-product-thumb">
                        <a href="#tabb33">
                          <img :src="product.images[1].url" alt=""/>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="popup-product-main-image-box">
                    <div class="tab-item popup-product-image" id="tabb11">
                      <div class="popup-product-single-image">
                        <img :src="product.image_url" alt=""/>
                      </div>
                    </div>

                    <div v-if="product.images.length > 0" class="tab-item popup-product-image" id="tabb22">
                      <div class="popup-product-single-image">
                        <img :src="product.images[0].url" alt=""/>
                      </div>
                    </div>

                    <div v-if="product.images.length > 1" class="tab-item popup-product-image" id="tabb33">
                      <div class="popup-product-single-image">
                        <img :src="product.images[1].url" alt=""/>
                      </div>
                    </div>

                    <button v-if="product.images.length > 0" class="prev"><i class="flaticon-back"></i></button>
                    <button v-if="product.images.length > 0" class="next"><i class="flaticon-next"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="popup-right-content">
                <h3>{{ product.title }}</h3>
                <!--                <div class="ratting"><i-->
                <!--                    class="flaticon-star"></i> <i-->
                <!--                    class="flaticon-star"></i> <i-->
                <!--                    class="flaticon-star"></i>-->
                <!--                  <i class="flaticon-star"></i> <i-->
                <!--                      class="flaticon-star"></i>-->
                <!--                  <span>(112)</span>-->
                <!--                </div>-->
                <p class="text"> {{ product.description }}
                </p>
                <div class="price">
                  <h2> {{ product.price }} руб</h2>
                  <h6 v-if="product.quantity > 0">В наличии</h6>
                  <h6 v-else> Нет в наличии</h6>
                </div>
                <div class="add-product">
                  <h6>Осталось в магазине: {{ product.quantity }}</h6>
                  <div class="button-group">
                    <div class="qtySelector text-center">
                      <span class="decreaseQty">
                        <i class="flaticon-minus"></i>
                      </span>
                      <input type="number" class="qtyValue" value="1"/>
                      <span class="increaseQty"> <i
                          class="flaticon-plus"></i>
                      </span></div>
                    <button class="btn--primary ">
                      Add to Cart
                    </button>
                  </div>
                </div>
                <div class="payment-method"><a href="#0"> <img
                    src="/assets/images/payment_method/method_1.png"
                    alt=""> </a>
                  <a href="#0"> <img
                      src="/assets/images/payment_method/method_2.png"
                      alt=""> </a> <a href="#0"> <img
                      src="/assets/images/payment_method/method_3.png"
                      alt=""> </a>
                  <a href="#0"> <img
                      src="/assets/images/payment_method/method_4.png"
                      alt=""> </a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="products-three-single-content text-center">
        <span> {{ product.category.title }}</span>
        <h5>
          <a :href="`#popup${product.id}`" class="popup_link">
            {{ product.title }}
          </a>
        </h5>
        <p> {{ product.price }} руб</p>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  name: "ProductCard",
  props: {
    product: {},
  }
}
</script>

<style scoped>

</style>

<template>
  <main class="overflow-hidden ">
    <!--Start Breadcrumb Style2-->
    <section class="breadcrumb-area" style="background-image: url(/assets/images/cart-back.png);">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="breadcrumb-content text-center wow fadeInUp animated">
              <h2>Cart</h2>
              <div class="breadcrumb-menu">
                <ul>
                  <li>
                    <router-link :to="{name: 'main.index'}"><i class="flaticon-home pe-2"></i>Home</router-link>
                  </li>
                  <li><i class="flaticon-next"></i></li>
                  <li class="active">Cart</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Breadcrumb Style2-->
    <!--Start cart area-->
    <section class="cart-area pt-120 pb-120">
      <div class="container">
        <div class="row wow fadeInUp animated">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="cart-table-box">
              <div class="table-outer">
                <table class="cart-table">
                  <thead class="cart-header">
                  <tr>
                    <th class="">Product Name</th>
                    <th class="price">Price</th>
                    <th style="width: 250px">Quantity</th>
                    <th>Subtotal</th>
                    <th class="hide-me"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <product-component-cart v-for="product in products" :product="product" @update="onStep1Update"></product-component-cart>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <div class="cart-button-box">
              <div class="cart-button-box-right wow fadeInUp animated">
                <button class="btn--primary mt-30" type="submit">
                  Continue Shopping
                </button>
                <button class="btn--primary mt-30" type="submit">
                  Update Cart
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-120">
          <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
            <div class="cart-total-box">
              <div class="inner-title">
                <h3>Cart Totals</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt--30">
          <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
            <div class="cart-total-box mt-30">
              <div class="table-outer">
                <table class="cart-table2">
                  <thead class="cart-header clearfix">
                  </thead>
                  <tbody>
                  <tr>
                    <td class="shipping"> Shipping</td>
                    <td class="selact-box1">
                      <ul class="shop-select-option-box-1">
                        <li><input type="checkbox" name="free_shipping" id="option_1"
                                   checked=""> <label for="option_1"><span></span>Free
                          Shipping</label></li>
                        <li><input type="checkbox" name="flat_rate" id="option_2"> <label
                          for="option_2"><span></span>Flat Rate</label></li>
                        <li><input type="checkbox" name="local_pickup" id="option_3">
                          <label for="option_3"><span></span>Local Pickup</label></li>
                      </ul>
                      <div class="inner-text">
                        <p>Shipping options will be updated during checkout</p>
                      </div>
                      <h4>Calculate Shipping</h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h4 class="total">Total</h4>
                    </td>
                    <td class="subtotal">$2500.00</td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
            <div class="cart-check-out mt-30">
              <h3>Check Out</h3>
              <ul class="cart-check-out-list">
                <li>
                  <div class="left">
                    <p>Subtotal</p>
                  </div>
                  <div class="right">
                    <p>$2500.00</p>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <p>Shipping</p>
                  </div>
                  <div class="right">
                    <p><span>Flat rate:</span> $50.00</p>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <p>Total Price:</p>
                  </div>
                  <div class="right">
                    <p>$2550.00</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End cart area-->
  </main>

</template>

<script>
import ProductComponentCart from "@/components/ProductComponentCart.vue";

export default {
  name: "Cart",
  components:{
    ProductComponentCart
  },
  methods:{
    onStep1Update () {
      let cart = JSON.parse(localStorage.getItem('cart'));
      this.products = cart;
    }
  },
  mounted() {
    let cart = JSON.parse(localStorage.getItem('cart'));
    this.products = cart;
  },
  data(){
    return {
      products:[],
    }
  }
}
</script>

<style scoped>

</style>

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
                    <th style="width: 220px">Quantity</th>
                    <th style="width: 250px">Subtotal</th>
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
                <router-link :to="{name:'main.products'}" class="btn--primary mt-30" type="submit">
                  Continue Shopping
                </router-link>
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
                      <select v-model="typeShip">
                        <option value="0">Самовывоз</option>
                        <option value="1">Доставка</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h4 class="total">Address</h4>
                    </td>
                    <td class="subtotal">
                      <input type="text" v-model="address" placeholder="Введите адрес доставки">
                    </td>
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
                    <p>Total Price:</p>
                  </div>
                  <div class="right">
                    <p>{{totalPrice}} руб</p>
                  </div>
                </li>
                <li>
                  <button @click.prevent="setOrder()" class="btn--primary mt-30">
                    Оформить заказ
                  </button>
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
import Index from "@/views/main/Index.vue";

export default {
  name: "Cart",
  components:{
    Index,
    ProductComponentCart
  },
  methods:{
    updateTotalPrice(){
      let sum = 0;
      for(let i = 0; i < this.products.length; i++){
        sum += this.products[i].price * this.products[i].quantity
      }
      this.totalPrice = sum;
    },
    onStep1Update () {
      let cart = JSON.parse(localStorage.getItem('cart'));
      this.products = cart;
      this.updateTotalPrice();
    },
    getProfile(){
      axios.post('http://shop/api/profile').then(result=>{
        let data = result.data.data;
        this.address = data.address;
        this.userId = data.id;
      })
    },

    setOrder(){
      let data = {
        'products': this.products,
        'address': this.address,
        'id_user': this.userId,
        'type_shipping': this.typeShip,
        'total_price': this.totalPrice,
      }
      axios.post('http://shop/api/setOrder', data).then(result=>{
        alert('Заказ успешно добавлен, вы можете отслеживать его в своем профиле в разделе "Orders", заказ с ID='+result.data.id);
      }).catch(err=>{
        alert(err.response.data['message'])
      })
      localStorage.removeItem('cart');
      this.$router.push({name: 'main.profile'})
    }
  },
  mounted() {
    let cart = JSON.parse(localStorage.getItem('cart'));
    this.products = cart;
    this.updateTotalPrice();
    if(localStorage.getItem('x_xsrf_token')){
      this.getProfile();
    }
  },
  data(){
    return {
      products:[],
      address: null,
      userId: null,
      typeShip: 0,
      totalPrice: 0
    }
  }
}
</script>

<style scoped>

</style>

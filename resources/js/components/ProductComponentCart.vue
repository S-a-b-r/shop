<template>
  <tr>
    <td>
      <div class="thumb-box">
        <a href="#" class="thumb">
          <img :src="this.product.image" alt="">
        </a> <a href="#" class="title">
        <h5>{{ this.product.title }}</h5>
      </a>
      </div>
    </td>
    <td>{{ this.product.price }} руб</td>
    <td style="width: 250px">
        <div class="qtySelector text-center">
          <span @click.prevent="quantityDec()">
            <i class="flaticon-minus"></i>
          </span>
          <input type="number"  v-model="quantityProduct" class="qtyValue"/>
          <span @click.prevent="quantityInc()">
            <i class="flaticon-plus"></i>
          </span>
      </div>
    </td>
    <td class="sub-total">{{this.product.price * quantityProduct}}.00 руб</td>
    <td>
      <div @click.prevent="remove()" class="remove"><i class="flaticon-cross"></i></div>
    </td>
  </tr>

</template>

<script>
export default {
  name: "ProductComponentCart",
  mounted() {
    this.quantityProduct = this.product.quantity;
  },
  methods:{
    remove(){
      let cart = JSON.parse(localStorage.getItem('cart'));
      cart = cart.filter(productInCart => this.product.id != productInCart.id);

      localStorage.setItem('cart', JSON.stringify(cart));
      this.$emit('update')
    },
    quantityInc(){
      this.quantityProduct++;
    },
    quantityDec(){
      this.quantityProduct--;
    },
  },
  props: {
    product: {},
  },
  data(){
    return {
      quantityProduct: 1
    }
  }
}
</script>

<style scoped>

</style>

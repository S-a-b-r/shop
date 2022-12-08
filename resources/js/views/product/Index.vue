<template>
  <main class="overflow-hidden ">
    <!--Start Breadcrumb Style2-->
    <div class="breadcrumb-area"
         style="background-image: url('/assets/images/products-grid/Frame1.png');">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="breadcrumb-content pb-60 text-center wow fadeInUp animated">
              <h2>Shop Grid</h2>
              <div class="breadcrumb-menu">
                <ul>
                  <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                  <li><i class="flaticon-next"></i></li>
                  <li class="active">Shop Grid</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End Breadcrumb Style2-->
    <!--Start Product Categories One-->
    <section class="product-categories-one pb-60">
      <div class="container">
        <div class="row wow fadeInUp animated">
          <div class="col-xl-12">
            <div class="product-categories-one__inner">
              <ul>
                <li v-for="brewery in topBreweries">
                  <router-link :to="{name: 'brewery.show', params: {id : brewery.id}}" class="img-box">
                    <div class="inner">
                      <img :src="brewery.logo" alt=""/>
                    </div>
                  </router-link>
                  <div class="title">
                    <router-link :to="{name: 'brewery.show', params: {id : brewery.id}}">
                      <h6>{{ brewery.title }}</h6>
                    </router-link>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Product Categories One-->
    <!--Start product-grid-->
    <div class="product-grid pt-60 pb-120">
      <div class="container">
        <div class="row gx-4">
          <div class="col-xl-3 col-lg-4">
            <div class="shop-grid-sidebar">
              <button class="remove-sidebar d-lg-none d-block"><i
                  class="flaticon-cross"> </i></button>
              <div class="sidebar-holder">
                <div class="single-sidebar-box mt-30 wow fadeInUp animated ">
                  <h4>Select Categories</h4>
                  <div class="checkbox-item">
                    <form>
                      <div v-for="category in filterList.categories" class="form-group">
                        <input v-model="categories" :value="category.id" type="checkbox" :id="category.id + 'category'">
                        <label :for="category.id + 'category'">{{ category.title }}</label></div>
                    </form>
                  </div>
                </div>
                <div class="single-sidebar-box mt-30 wow fadeInUp animated ">
                  <h4>Select Breweries</h4>
                  <div class="checkbox-item">
                    <form>
                      <div v-for="brewery in filterList.breweries" class="form-group">
                        <input v-model="breweries" :value="brewery.id" type="checkbox" :id="brewery.id + 'brewery'">
                        <label :for="brewery.id + 'brewery'">{{ brewery.title }}</label></div>
                    </form>
                  </div>
                </div>
                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                  <h4>Filter By Price</h4>
                  <div class="slider-box">
                    <div id="price-range" class="slider"></div>
                    <div class="output-price">
                      <label for="priceRange">Price:</label>
                      <input type="text" id="priceRange" readonly>
                    </div>
                  </div>
                </div>
                <div class="single-sidebar-box mt-30 wow fadeInUp animated ">
                  <h4>Tags</h4>
                  <div class="checkbox-item">
                    <div v-for="tag in filterList.tags" class="form-group">
                      <input v-model="tags" :value="tag.id" type="checkbox" :id="tag.id + 'tag'">
                      <label :for="tag.id + 'tag'">{{ tag.title }}</label></div>
                  </div>
                  <div class="slider-box">
                    <button class="filterbtn" type="submit" @click.prevent="getProductsByFilter"> Filter</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-9 col-lg-8">
            <div class="row">
              <div class="col-xl-12">
                <div
                    class="shop-grid-page-top-info p-0 justify-content-md-between justify-content-center">
                  <div class="left-box wow fadeInUp animated">
                    <p>Showing {{pagination.from}} - {{pagination.to}} of {{pagination.total}} Results</p>
                  </div>
                  <div class="right-box justify-content-md-between justify-content-center wow fadeInUp animated">
                    <div class="short-by">
                      <div class="select-box">
                        <select class="wide" display="none">
                          <option data-display="Short by latest">Featured</option>
                          <option value="1">Best selling</option>
                          <option value="2">Alphabetically, A-Z</option>
                          <option value="3">Alphabetically, Z-A</option>
                          <option value="3">Price, low to high</option>
                          <option value="3">Price, high to low</option>
                          <option value="3">Date, old to new</option>
                        </select>
                        <div class="nice-select wide" tabindex="0">
                          <span class="current">Date, new to old</span>
                          <ul class="list">
                            <li data-value="1" class="option selected" @click="sortBy = 1; getProductsByFilter()">Date, new to old</li>
                            <li data-value="2" class="option" @click="sortBy = 2; getProductsByFilter()">Date, old to new</li>
                            <li data-value="3" class="option" @click="sortBy = 3; getProductsByFilter()">Alphabetically, A-Z</li>
                            <li data-value="4" class="option" @click="sortBy = 4; getProductsByFilter()">Alphabetically, Z-A</li>
                            <li data-value="5" class="option" @click="sortBy = 5; getProductsByFilter()">Price, low to high</li>
                            <li data-value="6" class="option" @click="sortBy = 6; getProductsByFilter()">Price, high to low</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-grid" role="tabpanel"
                       aria-labelledby="pills-grid-tab">
                    <div class="row">
                      <product-card v-for="product in products" :product="product"></product-card>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div v-if="this.pagination.length != 0"
                   class="col-12 d-flex justify-content-center wow fadeInUp animated">
                <ul class="pagination text-center">
                  <li v-if="this.pagination.current_page != 1" class="next">
                    <a @click.prevent="getProductsByFilter(1)">
                      <i class="flaticon-left-arrows" aria-hidden="true"></i>
                    </a>
                  </li>

                  <li v-for="link in this.notFullLinks">
                    <a @click.prevent="getProductsByFilter(link.label)" :class="link.active? 'active': null">
                      {{ link.label }}
                    </a>
                  </li>

                  <li v-if="this.pagination.current_page != this.pagination.links.length - 2" class="next">
                    <a @click.prevent="getProductsByFilter(this.pagination.links[this.pagination.links.length-2].label)">
                      <i class="flaticon-arrow-right"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End product-grid-->
  </main>
</template>

<script>
import ProductCard from "./ProductCard.vue";

export default {
  name: "Index",
  components: {
    ProductCard,
  },

  mounted() {
    $(document).trigger('changed')
    this.getFilterList(this.getProductsByFilter);
    this.getTopBreweries();
  },

  methods: {
    getTopBreweries() {
      this.axios.get('http://shop/api/top-breweries').then(
          res => {
            this.topBreweries = res.data.data;
          }).finally(v => {
        $(document).trigger('changed')
      });
    },

    getProductsByFilter(page = 1) {
      let prices = $('#priceRange').val();

      prices = prices.slice(0, prices.length - 4).split(' - ');

      this.axios.post('http://shop/api/products/filter', {
        'sorted_by': this.sortBy,
        'categories': this.categories,
        'tags': this.tags,
        'prices': prices,
        'breweries': this.breweries,
        'page': page,
      }).then(
          res => {
            this.products = res.data.data;
            this.pagination = res.data.meta;
            this.notFullLinks = this.pagination.links.slice(1, -1);
          }
      )
          .finally(v => {
            $(document).trigger('changed')
          });
    },

    getFilterList(callback) {
      this.axios.get('http://shop/api/filters').then(
          res => {
            this.filterList = res.data;
            if ($("#price-range").length) {
              $("#price-range").slider({
                range: true,
                min: this.filterList.price.min,
                max: this.filterList.price.max,
                values: [this.filterList.price.min, this.filterList.price.max],
                slide: function (event, ui) {
                  $("#priceRange").val(ui.values[0] + " - " + ui.values[1] + " руб");
                }
              });
              $("#priceRange").val($("#price-range").slider("values", 0) + " - " + $("#price-range").slider("values", 1) + " руб");
              callback();
            }
            ;
          }
      )
          .finally(v => {
            $(document).trigger('initFilters')
          });
    }
  },

  data() {
    return {
      topBreweries: [],
      products: [],
      filterList: [],
      categories: [],
      tags: [],
      prices: [],
      breweries: [],
      pagination: [],
      notFullLinks: [],
      sortBy: '1'
    }
  }
}
</script>

<style scoped>

</style>

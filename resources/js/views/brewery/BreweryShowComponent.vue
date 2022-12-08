<template>
  <main>
    <!--End Shop Details Breadcrumb-->
    <div class="container mt-3">
      <h1>{{ brewery.title }}</h1>
      <div class="d-flex">
        <img :src="brewery.logo" style="width: 30%">
        <div class="p-4 m-2" style="font-size: 23px; width: 70%">{{ brewery.description }}</div>
      </div>
    </div>
    <!-- productdrescription-tabStart -->
    <section class="product pt-60 pb-60 wow fadeInUp overflow-hidden ">
      <div class="container ">
        <div class="row wow fadeInUp animated">
          <div class="col-12">
            <ul class="nav product-details-nav nav-three nav-pills justify-content-center"
                id="pills-tab-two" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active"
                        id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description"
                        type="button" role="tab" aria-controls="pills-description" aria-selected="true">
                  Products
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-review-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-review" type="button" role="tab"
                        aria-controls="pills-review" aria-selected="false"> Reviews
                </button>
              </li>
            </ul>
          </div>
        </div>
        <div class="row wow fadeInUp animated">
          <div class="tab-content" id="pills-tabContent-two">
            <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                 aria-labelledby="pills-description-tab">
              <div class="product-drescription">
                <div class="row align-items-center">
                  <h2>Products </h2>
                  <product-card v-for="product in brewery.products" :product="product"></product-card>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
              <div class="product-drescription">
                <div class="review-single pt-0 hed">
                  <div class="ratting"><i class="flaticon-star-1"></i> <i
                      class="flaticon-star-1"></i> <i class="flaticon-star-1"></i> <i
                      class="flaticon-star-1"></i> <i class="flaticon-star-1"></i> <span
                      class="ps-2">BASED ON 100 REVIEW</span></div>
                </div>
                <div class="review-single">
                  <div class="left">
                    <div class="ratting"><i class="flaticon-star-1"></i> <i
                        class="flaticon-star-1"></i> <i class="flaticon-star-1"></i> <i
                        class="flaticon-star-1"></i> <i class="flaticon-star-1"></i></div>
                    <h6>Vary Good quality Theme <span>Raul Bates on January 28, 2022</span></h6>
                    <p> Assertively conceptualize parallel process improvements through user
                      friendly colighue to action items. Interactively antidos cultivate
                      interdependent customer service without clicks-and-mortar e-services. </p>
                  </div>
                  <a href="#0" class="right-box"> Report this Comments </a>
                </div>
                <div class="review-single">
                  <div class="left">
                    <div class="ratting"><i class="flaticon-star-1"></i> <i
                        class="flaticon-star-1"></i> <i class="flaticon-star-1"></i> <i
                        class="flaticon-star-1"></i> <i class="flaticon-star-1"></i></div>
                    <h6> Amazing Theme <span>Kurt Morgan on January 28, 2022</span></h6>
                    <p> Assertively conceptualize parallel process improvements through user
                      friendly colighue to action items. Interactively antidos cultivate
                      interdependent customer service without clicks-and-mortar e-services. </p>
                  </div>
                  <a href="#0" class="right-box">Report this Comments </a>
                </div>
                <div class="review-from-box mt-30">
                  <h6>Write a Review</h6>
                  <form action="#" class="review-from">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="ratting-box">
                          <p> RATING </p>
                          <div class="ratting"><i class="flaticon-star-1"></i> <i
                              class="flaticon-star-1"></i> <i class="flaticon-star-1"></i>
                            <i class="flaticon-star-1"></i> <i class="flaticon-star-1"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group"><label for="name">NAME</label> <input
                            type="text" id="name" class="form-control"
                            placeholder="David Warner"></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group"><label for="number">Number</label> <input
                            type="text" id="number" class="form-control"
                            placeholder="Phone Number"></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group"><label for="email"> Email </label> <input
                            type="text" id="email" class="form-control"
                            placeholder="support@gmail.com"></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group"><label for="namee"> REVIEW TITLE</label> <input
                            type="text" id="namee" class="form-control"
                            placeholder="Give your review title"></div>
                      </div>
                      <div class="col-12">
                        <div class="form-group m-0"><label for="email">BODY OF REVIEW (1500)
                        </label> <textarea
                            placeholder="Write Your Comments Here"></textarea></div>
                      </div>
                    </div>
                    <button type="submit" class="btn--primary style2 ">Submit Review
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
import ProductCard from "../product/ProductCard.vue";
export default {
  name: "BreweryShowComponent",
  components: {
    ProductCard,
  },
  mounted() {
    $(document).trigger('changed')
    this.getBrewery();
  },

  methods: {
    getBrewery() {
      let id = this.$route.params.id;
      this.axios.get('http://shop/api/brewery/' + id).then(
          res => {
            this.brewery = res.data.data;
            console.log(this.brewery);

          }).finally(v => {
        $(document).trigger('changed')
      });
    }
  },
  data() {
    return {
      brewery: [],
    }
  }
};
</script>

<style scoped>

</style>

<template>
  <div class="w-2/4 relative">
    <div class="search flex items-center overflow-hidden">
      <input
        type="text"
        name="query"
        style="padding: 11px 20px;"
        @keyup="fetchProducts()"
        v-model="searchString"
        autocomplete="off"
        id=""
        class="rounded-none border border-r-0 leading-5 text-base w-full focus:outline-none"
        placeholder="Search"
      />
      <form action="/search-result" method="get">
        <input
          autocomplete="off"
          type="hidden"
          name="searchQuery"
          id="searchQuery"
          v-model="searchString"
        />
        <button
          :type="[searchString == null ? 'reset' : 'submit']"
          class="focus:outline-none"
        >
          <i
            class="fas fa-search py-3 text-xl px-7 bg-teal-400 text-white hover:bg-teal-500"
          ></i>
        </button>
      </form>
    </div>
    <div
      class="w-full bg-white box-shadow absolute z-50 flex items-center justify-center flex-col"
      style="max-height: 18rem; min-height: 8rem;"
      v-if="products != null"
    >
      <div class="w-full h-full overflow-y-scroll scroll-bar-hide p-4 relative">
        <div
          class="flex py-3 border-b border-gray-100"
          v-for="(product, i) in products"
          :key="i"
        >
          <div class="w-20 h-20 mr-4">
            <img
              class="object-cover w-full h-full"
              :src="product.thumbnail"
              alt=""
            />
          </div>
          <div class="">
            <a :href="'/shop/' + product.slug" class="mt-1 mb-2">
              <h1 class="text-gray-700 hover:text-teal-400">
                {{ product.title }}
              </h1>
            </a>
            <p
              class="text-teal-400 font-bold"
              v-text="convertToCurrency(product.price)"
            ></p>
          </div>
        </div>
        <div
          class="w-full text-center absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2"
          v-if="loading == true"
        >
          <i class="fas fa-spinner fa-pulse text-3xl text-teal-400"></i>
        </div>
        <div
          class="w-full text-center absolute top-0 left-0 right-0 bottom-0 bg-white"
          v-if="this.products.length == 0"
        >
          <p>No result</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import _ from 'lodash'
export default {
  data() {
    return {
      products: null,
      searchString: null,
      loading: null,
    }
  },
  methods: {
    fetchProducts: _.debounce(function () {
      if ((this.searchString != null) & (this.searchString.length > 2)) {
        this.loading = true
        axios
          .post(`/api/search`, {
            query: this.searchString,
          })
          .then((res) => {
            this.loading = null
            this.products = res.data
            console.log(res)
          })
      } else if (
        this.searchString.length > 1 ||
        this.searchString.length == 0
      ) {
        this.products = null
      }
    }, 200),
    convertToCurrency(price) {
      //   price = price / 100
      return price.toLocaleString('es-US', {
        style: 'currency',
        currency: 'USD',
      })
    },
  },
}
</script>

<style scoped>
.scroll-bar-hide::-webkit-scrollbar {
  display: none;
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
}
</style>

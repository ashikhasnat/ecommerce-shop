<template>
  <div class="flex flex-col">
    <div
      class="grid grid-cols-4 rounded-md text-xs sm:text-base mb-6"
      v-for="(product, i) in products"
      :key="i"
    >
      <div class="col-span-1 flex items-center">
        <div class="mr-2 lg:mr-8">
          <i
            @click="DeleteProductFromWishlist(product.id)"
            class="fas fa-times border py-2 px-3 text-gray-500 rounded-full hover:text-white hover:bg-red-500 cursor-pointer"
          ></i>
        </div>
        <div
          class="w-24 h-24 lg:w-20 lg:h-20 border mr-6 hidden sm:block"
          style="min-width: 6rem;"
        >
          <img :src="product.thumbnail" alt="" class="object-cover h-full" />
        </div>
        <a
          :href="'shop/' + product.slug"
          class="text-gray-700 hover:text-teal-400"
        >
          {{ product.title }}
        </a>
      </div>
      <div class="col-span-1 justify-self-center transform translate-y-7">
        <p class="text-gray-700 font-semibold">${{ product.price }}</p>
      </div>
      <div class="col-span-1 justify-self-center">
        <div
          class="text-xs sm:text-sm font-medium text-gray-500 my-4 max-w-max-content transform translate-y-2"
        >
          <p
            class="px-4 py-1 border text-red-400 border-red-400"
            v-if="product.stock_status == 0"
          >
            Out Of Stock
          </p>
          <p v-else class="px-4 py-1 border text-green-400 border-green-400">
            in Stock
          </p>
        </div>
      </div>
      <div class="col-span-1 justify-self-center transform translate-y-6">
        <button
          @click="postToCart(product.id, product.price)"
          class="text-white bg-teal-400 py-1 px-5 text-xs sm:text-sm w-max-content uppercase focus:outline-none"
        >
          add to cart
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from 'axios'
export default {
  data() {
    return {
      products: '',
      quantity: 1,
    }
  },
  mounted() {
    this.fetchWishlistData()
  },
  methods: {
    postToCart(id, price) {
      axios
        .post(`/api/cart/${id}`, {
          product_id: id,
          quantity: this.quantity,
          price: price,
        })
        .then((res) => {
          this.$store.dispatch('fetchCartItemTotal')
          this.$store.commit('setClasses', 'success')
          this.$store.commit('setToastrMsg', 'Added To Cart')
          setTimeout(() => {
            this.$store.commit('setToastrMsg', '')
          }, 3000)
          // this.data = res.data
        })
    },
    DeleteProductFromWishlist(id) {
      Axios.delete(`/api/wishlist/${id}`).then(() => {
        this.fetchWishlistData()
        this.$store.dispatch('fetchWishlistDataTotal')
        this.$store.commit('setClasses', 'error')
        this.$store.commit('setToastrMsg', 'Deleted From Wishlist')
        setTimeout(() => {
          this.$store.commit('setToastrMsg', '')
        }, 5000)
      })
    },
    fetchWishlistData() {
      Axios.get('/api/wishlist').then((res) => {
        this.products = res.data
      })
    },
  },
}
</script>

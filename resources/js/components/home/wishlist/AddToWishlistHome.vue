<template>
  <div class="flex items-center font-normal relative">
    <a
      href="/wishlist"
      class="cursor-pointer flex bg-white justify-center items-center text-red-500 w-10 h-10 hover:bg-red-500 hover:text-white rounded-full text-center"
      v-if="show"
    >
      <i class="far fa-heart text-2xl"></i>
    </a>
    <span
      @click="postToWishlist()"
      class="cursor-pointer bg-white flex justify-center items-center w-10 h-10 text-gray-700 hover:text-white rounded-full text-center hover:bg-red-500"
      v-else
    >
      <i class="far fa-heart text-2xl"></i>
    </span>
  </div>
</template>

<script>
import Axios from 'axios'
export default {
  name: 'AddToWishlistHome',
  props: {
    product_id: Number,
    auth_id: {
      type: Number,
      default: null,
    },
  },
  data() {
    return {
      data: '',
      show: null,
    }
  },
  mounted() {
    this.fetchWishlistData()
  },
  methods: {
    postToWishlist() {
      Axios.post('/api/wishlist', {
        product_id: this.product_id,
      })
        .then((res) => {
          this.show = true
          this.$store.dispatch('fetchWishlistDataTotal')
          this.$store.commit('setClasses', 'success')
          this.$store.commit('setToastrMsg', 'Added To Wishlist')
          setTimeout(() => {
            this.$store.commit('setToastrMsg', '')
          }, 3000)
        })
        .catch((error) => {
          if (this.auth_id == null) {
            // Request made and server responded
            this.$store.commit('setClasses', 'error')
            this.$store.commit('setToastrMsg', 'Log In First')
            setTimeout(() => {
              this.$store.commit('setToastrMsg', '')
            }, 5000)
            return
          }
          if (error.response.status == 500) {
            // Request made and server responded
            this.$store.commit('setClasses', 'error')
            this.$store.commit('setToastrMsg', 'Already in Wishlist')
            setTimeout(() => {
              this.$store.commit('setToastrMsg', '')
            }, 5000)
          }
        })
    },
    fetchWishlistData() {
      Axios.get('/api/wishlist').then((res) => {
        this.data = res.data
        this.data.forEach((element) => {
          if (element.product_id == this.product_id) {
            return (this.show = true)
          }
        })
      })
    },
  },
}
</script>

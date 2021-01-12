<template>
  <div class="flex items-center font-normal my-3 text-gray-500 relative">
    <a href="/wishlist" class="cursor-pointer text-red-500" v-if="show">
      <i class="fas fa-heart mr-2"></i>
      <span>Browse Wishlist</span>
    </a>
    <span @click="postToWishlist()" class="cursor-pointer" v-else>
      <i class="fas fa-heart mr-2"></i>
      <span>Add To Wishlist</span>
    </span>
  </div>
</template>

<script>
import Axios from 'axios'
export default {
  name: 'AddToWishlist',
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

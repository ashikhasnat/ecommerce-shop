<template>
  <div class="text-xl flex">
    <div class="relative">
      <i
        class="fas fa-user-alt cursor-pointer hover:text-teal-400"
        @click="showDropdown()"
      ></i>
      <ul
        :class="[
          show
            ? 'visible transform -translate-x-11/12'
            : 'invisible transform -translate-x-10/12',
        ]"
        class="text-sm z-50 absolute left-0 bg-white w-36 px-3 box-shadow mt-2 transition-all duration-200 ease-linear rounded-sm"
      >
        <li class="py-2 hover:text-teal-400">
          <a href="/shop/my-account">My Account</a>
        </li>
        <li class="py-2 border-t border-b border-gray-100 hover:text-teal-400">
          <a href="/wishlist">Wishlist</a>
        </li>
        <li class="py-2 hover:text-teal-400">
          <a href="/checkout">CheckOut</a>
        </li>
        <li
          v-if="auth_id"
          @click="logout()"
          class="py-2 hover:text-teal-400 cursor-pointer"
        >
          Log Out
        </li>
        <li v-else class="py-2 hover:text-teal-400 cursor-pointer">
          <a href="/login">Log in</a>
        </li>
      </ul>
    </div>
    <div class="relative text-center mx-6">
      <span
        class="absolute bg-teal-400 text-white font-semibold text-xs w-5 h-5 right-0 rounded-full transform -translate-y-1 translate-x-3"
      >
        {{ wishlistDataLength }}
      </span>
      <a href="/wishlist"><i class="far fa-heart hover:text-teal-400"></i></a>
    </div>
    <a href="/cart" class="relative text-center">
      <span
        class="absolute bg-teal-400 text-white font-semibold text-xs w-5 h-5 right-0 rounded-full transform -translate-y-1 translate-x-3"
      >
        {{ CartItemLength }}
      </span>
      <i class="fas fa-shopping-cart hover:text-teal-400"></i>
    </a>
  </div>
</template>

<script>
import Axios from 'axios'
import { mapGetters } from 'vuex'
export default {
  data() {
    return {
      show: false,
      data: '',
    }
  },
  props: {
    auth_id: Boolean,
  },
  computed: {
    ...mapGetters({
      wishlistDataLength: 'wishlistDataLength',
      CartItemLength: 'CartItemLength',
    }),
  },
  mounted() {
    this.$store.dispatch('fetchWishlistDataTotal')
    this.$store.dispatch('fetchCartItemTotal')
  },
  methods: {
    showDropdown() {
      this.show = !this.show
    },
    logout() {
      Axios.post('/logout').then(() => {
        this.$store.commit('setClasses', 'error')
        this.$store.commit('setToastrMsg', 'Logged Out')
        setTimeout(() => {
          this.$store.commit('setToastrMsg', '')
        }, 3000)
      })
    },
  },
}
</script>

<template>
  <div
    class="text-base sm:text-xl flex items-center justify-center ml-4 sm:ml-0"
  >
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
        <li v-if="super_admin" class="py-2 hover:text-teal-400 cursor-pointer">
          <a href="/dashboard" target="_blank">Dashboard</a>
        </li>
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
          Logout
        </li>
        <li v-else class="py-2 hover:text-teal-400 cursor-pointer">
          <a href="/login">Login</a>
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
    <div class="relative">
      <span
        class="text-center absolute bg-teal-400 text-white right-0 font-semibold text-xs w-5 h-5 rounded-full transform -translate-y-1 translate-x-3"
      >
        {{ CartItemLength }}
      </span>
      <i
        @click="showCartDropdown()"
        class="fas fa-shopping-cart hover:text-teal-400 cursor-pointer"
      ></i>
      <div
        v-if="cartShow"
        :class="[
          cartShow
            ? 'visible transform -translate-x-11/12'
            : 'invisible transform -translate-x-10/12',
        ]"
        class="text-sm w-80 md:w-96 z-50 absolute left-0 bg-white px-3 box-shadow mt-2 rounded-sm"
      >
        <div
          v-if="CartItemLength != 0"
          class="w-full h-full overflow-y-scroll scroll-bar-hide p-3 relative"
          style="max-height: 18rem; min-height: 6rem;"
        >
          <div
            class="flex py-3 border-b border-gray-100 relative"
            v-for="(product, i) in AllCartItem"
            :key="i"
          >
            <i
              @click="DeleteProductFromCart(product.id)"
              class="fas fa-trash-alt absolute right-0 top-4 hover:text-red-500 cursor-pointer"
            ></i>
            <div class="w-16 h-16 mr-4">
              <img
                class="object-cover w-full h-full"
                :src="product.thumbnail"
                alt=""
              />
            </div>
            <div class="text-left">
              <a :href="'/shop/' + product.slug" class="mt-1 mb-2">
                <h1
                  class="text-gray-700 hover:text-teal-400 text-sm sm:text-base"
                >
                  {{ product.title }}
                </h1>
              </a>
              <small class="flex items-center">
                <span class="text-sm mr-1">{{ product.quantity }}</span>
                <span class="text-sm mr-1">x</span>
                <p
                  class="text-teal-400 font-semibold text-sm"
                  v-text="convertToCurrency(product.sub_total)"
                ></p>
              </small>
            </div>
          </div>
        </div>
        <div class="text-center py-6 font-semibold text-lg" v-else>
          <p>No Products</p>
        </div>
        <section class="h-28 mb-3 p-4">
          <div
            class="flex text-gray-500 items-center justify-between text-lg relative cart-line"
          >
            <p class="bg-white pr-2">TOTAL:</p>
            <p
              class="bg-white pl-2"
              v-text="convertToCurrency(getTotalAmount)"
            ></p>
          </div>
          <div class="flex mt-4 text-white font-semibold">
            <p class="py-2 px-6 bg-teal-400 mr-4">
              <a href="/cart">View Cart</a>
            </p>
            <p class="py-2 px-6 bg-gray-600 hover:bg-gray-700">
              <a href="/checkout">CheckOut</a>
            </p>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from 'axios'
import { mapGetters } from 'vuex'
export default {
  data() {
    return {
      show: false,
      cartShow: false,
      data: '',
    }
  },
  props: {
    auth_id: Boolean,
    super_admin: Boolean,
  },
  computed: {
    ...mapGetters({
      wishlistDataLength: 'wishlistDataLength',
      CartItemLength: 'CartItemLength',
      AllCartItem: 'AllCartItem',
      getTotalAmount: 'getTotalAmount',
    }),
  },
  mounted() {
    this.$store.dispatch('fetchWishlistDataTotal')
    this.$store.dispatch('fetchCartItemTotal')
    this.$store.dispatch('fetchTotalAmount')
  },
  methods: {
    showDropdown() {
      this.show = !this.show
    },
    showCartDropdown() {
      this.cartShow = !this.cartShow
    },
    DeleteProductFromCart(id) {
      axios.delete(`/api/cart/${id}`).then(() => {
        this.$store.dispatch('fetchCartItemTotal')
        this.$store.commit('setClasses', 'error')
        this.$store.commit('setToastrMsg', 'Deleted From Cart')
        this.$store.dispatch('fetchTotalAmount')
        setTimeout(() => {
          this.$store.commit('setToastrMsg', '')
        }, 5000)
      })
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
<style scoped>
.scroll-bar-hide::-webkit-scrollbar {
  display: none;
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
}
.cart-line::after {
  content: '';
  position: absolute;
  width: 100%;
  top: 50%;
  left: 0;
  background-color: rgba(44, 44, 44, 0.146);
  height: 1px;
  z-index: -1;
}
</style>

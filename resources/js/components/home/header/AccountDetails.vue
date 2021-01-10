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
        class="text-sm absolute left-0 bg-white w-36 px-3 box-shadow mt-2 transition-all duration-200 ease-linear rounded-sm"
      >
        <li class="py-2 hover:text-teal-400"><a href="">My Account</a></li>
        <li class="py-2 border-t border-b border-gray-100 hover:text-teal-400">
          <a href="/wishlist">Wishlist</a>
        </li>
        <li class="py-2 hover:text-teal-400"><a href="">CheckOut</a></li>
      </ul>
    </div>
    <div class="relative text-center mx-6">
      <span
        class="absolute bg-teal-400 text-white font-semibold text-xs w-5 h-5 right-0 rounded-full transform -translate-y-1 translate-x-3"
        >{{ data.length }}</span
      >
      <a href="/wishlist"><i class="far fa-heart hover:text-teal-400"></i></a>
    </div>
    <slot></slot>
  </div>
</template>

<script>
import Axios from 'axios'
    export default {
        data() {
            return {
                show: false,
                data: ''
            }
        },
        mounted () {
          this.fetchWishlistDataTotal();
        },
        methods: {
            showDropdown() {
                this.show = !this.show
            },
            fetchWishlistDataTotal() {
              Axios.get('/api/wishlist')
                  .then((res) => {
                    this.data = res.data
                  })
            }
        },
    }
</script>

<style scoped>
</style>
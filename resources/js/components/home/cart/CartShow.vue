<template>
  <div class="grid grid-cols-1 md:grid-cols-8 gap-x-6">
    <main class="col-span-full md:col-span-5">
      <div class="">
        <div
          v-if="CartItemLength != 0"
          class="grid grid-cols-4 justify-items-center text-xs sm:text-base rounded-md font-normal lg:font-bold mb-6"
        >
          <p class="col-span-1 bg-gray-100 w-full py-3 rounded-md text-center">
            PRODUCT NAME
          </p>
          <p class="col-span-1 bg-gray-100 w-full py-3 rounded-md text-center">
            UNIT PRICE
          </p>
          <p
            class="col-span-1 bg-gray-100 w-full py-3 rounded-md text-center uppercase"
          >
            Quantity
          </p>
          <p
            class="col-span-1 bg-gray-100 w-full py-3 rounded-md text-center uppercase"
          >
            Sub Total
          </p>
        </div>
        <div
          v-else
          class="grid grid-cols-1 justify-items-center bg-gray-100 py-3 rounded-md font-normal lg:font-bold mb-6"
        >
          <p class="col-span-1">Cart Is Empty</p>
        </div>
      </div>
      <div class="">
        <div
          class="grid grid-cols-4 rounded-md text-xs sm:text-base mb-6"
          v-for="(product, i) in AllCartItem"
          :key="i"
        >
          <div class="col-span-1 flex items-center">
            <div class="mr-2 lg:mr-8">
              <i
                @click="DeleteProductFromCart(product.id)"
                class="fas fa-times border py-2 px-3 text-gray-500 rounded-full hover:text-white hover:bg-red-500 cursor-pointer"
              ></i>
            </div>
            <p class="text-gray-700">{{ product.title }}</p>
          </div>
          <div class="col-span-1 justify-self-center transform translate-y-7">
            <p
              class="text-gray-600 font-semibold"
              v-text="convertToCurrency(product.price)"
            ></p>
          </div>
          <div class="col-span-1 justify-self-center">
            <div
              class="text-xs sm:text-sm font-medium text-gray-500 my-4 max-w-max-content transform translate-y-2"
            >
              <p class="px-4">
                <quantity
                  :cart_id="product.id"
                  :product_price="product.price"
                  :product_quantity="product.quantity"
                ></quantity>
              </p>
            </div>
          </div>
          <div class="col-span-1 justify-self-center">
            <!-- subtotal -->
            <div
              class="text-xs sm:text-lg font-medium text-gray-700 my-4 max-w-max-content transform translate-y-2"
            >
              <p
                class="px-4 py-1"
                v-text="convertToCurrency(product.sub_total)"
              ></p>
            </div>
          </div>
        </div>
      </div>
    </main>
    <total-amount>
      <div
        v-if="coupon_code != null"
        slot="session_coupon"
        class="grid grid-cols-2 mt-10 ml-4 text-gray-600 text-base sm:text-xl justify-items-center"
      >
        <p class="col-span-1">
          Coupon: ({{ coupon_code }})
          <span class="text-gray-900 p-px"></span>
          <i
            @click="deleteCoupon()"
            class="far fa-times-circle text-sm text-red-400 opacity-50 hover:opacity-100 cursor-pointer"
          ></i>
        </p>
        <p class="col-span-1">{{ discount }}%</p>
      </div>
    </total-amount>
  </div>
</template>

<script>
import axios from 'axios'
import { mapGetters } from 'vuex'
import Quantity from './Quantity.vue'
import TotalAmount from './TotalAmount.vue'
export default {
  components: { Quantity, TotalAmount },
  computed: {
    ...mapGetters({
      AllCartItem: 'AllCartItem',
      CartItemLength: 'CartItemLength',
    }),
  },
  props: {
    coupon_code: {
      default: null,
    },
    discount: {
      default: null,
    },
  },
  methods: {
    updateCartItems(id, value) {
      axios.put(`/api/cart/${id}`).then((res) => {
        this.$store.dispatch('fetchTotalAmount')
        console.log('ok')
      })
    },
    deleteCoupon() {
      axios.delete('/api/destroy-session').then((res) => {
        this.$store.commit('setClasses', 'error')
        this.$store.commit('setToastrMsg', res.data)
        this.$store.dispatch('fetchTotalAmount')
        location.reload()
        setTimeout(() => {
          this.$store.commit('setToastrMsg', '')
        }, 5000)
        console.log('ok')
      })
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
  },
}
</script>

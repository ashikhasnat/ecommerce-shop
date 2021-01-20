<template>
  <div class="col-span-3">
    <div class="flex flex-col shadow">
      <h1
        class="bg-gray-100 text-center w-full py-3 rounded-md font-normal lg:font-bold"
      >
        Cart Total
      </h1>
      <slot name="session_coupon"></slot>
      <div
        class="border h-44 border-t-0 border-gray-100 flex items-center justify-around"
      >
        <p class="font-normal text-xl lg:font-bold">Grand Total</p>
        <p
          class="text-gray-600 font-semibold"
          v-text="convertToCurrency(getTotalAmount)"
        ></p>
      </div>
    </div>
    <div class="mt-6">
      <input
        class="border py-1 px-2 focus:outline-none rounded"
        type="text"
        name="coupon_code"
        placeholder="Coupon Code"
        v-model="coupon"
      />
      <button
        @click="checkCoupon()"
        class="focus:outline-none bg-purple-500 py-1 px-4 text-white rounded"
      >
        Add Coupon
      </button>
    </div>
    <div
      class="bg-gray-700 text-white w-max-content py-2 px-6 mt-6 rounded-sm hover:bg-gray-900"
    >
      <button
        class="uppercase font-semibold cursor-not-allowed focus:outline-none"
        disabled
        v-if="CartItemLength == 0"
      >
        Proceed to checkout
      </button>
      <button v-else class="uppercase font-semibold focus:outline-none">
        <a href="/checkout">Proceed to checkout</a>
      </button>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import { mapGetters } from 'vuex'
export default {
  data() {
    return {
      coupon: '',
    }
  },
  mounted() {
    this.$store.dispatch('fetchTotalAmount')
  },
  methods: {
    checkCoupon() {
      axios
        .post('/api/set-session', {
          coupon_code: this.coupon,
        })
        .then((res) => {
          this.coupon = ''
          this.$store.commit('setClasses', 'success')
          this.$store.commit('setToastrMsg', res.data)
          setTimeout(() => {
            this.$store.commit('setToastrMsg', '')
          }, 3000)
          this.$store.dispatch('fetchTotalAmount')
          location.reload()
        })
        .catch((e) => {
          this.coupon = ''
          this.$store.commit('setClasses', 'error')
          this.$store.commit('setToastrMsg', 'Coupon No Found')
          setTimeout(() => {
            this.$store.commit('setToastrMsg', '')
          }, 3000)
        })
    },
  },
  computed: {
    ...mapGetters({
      getTotalAmount: 'getTotalAmount',
      CartItemLength: 'CartItemLength',
    }),
  },
}
</script>

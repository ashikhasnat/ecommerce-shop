<template>
  <div class="col-span-3">
    <div class="flex flex-col shadow">
      <h1
        class="bg-gray-100 text-center w-full py-3 rounded-md font-normal lg:font-bold"
      >
        Cart Total
      </h1>
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
    <div
      class="bg-gray-700 text-white w-max-content py-2 px-6 mt-6 rounded-sm hover:bg-gray-900"
    >
      <button
        class="uppercase font-semibold cursor-not-allowed"
        disabled
        v-if="CartItemLength == 0"
      >
        Proceed to checkout
      </button>
      <button v-else class="uppercase font-semibold">
        <a href="/checkout">Proceed to checkout</a>
      </button>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  mounted() {
    this.$store.dispatch('fetchTotalAmount')
  },
  computed: {
    ...mapGetters({
      getTotalAmount: 'getTotalAmount',
      CartItemLength: 'CartItemLength',
    }),
  },
}
</script>

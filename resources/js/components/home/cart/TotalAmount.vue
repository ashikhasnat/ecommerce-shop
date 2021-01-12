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
    }),
  },
  methods: {
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

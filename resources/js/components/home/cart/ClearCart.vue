<template></template>
<script>
import axios from 'axios'
export default {
  mounted() {
    this.clearCart()
  },
  methods: {
    clearCart() {
      axios.delete('/api/clear-cart').then(() => {
        this.$store.dispatch('fetchCartItemTotal')
        this.$store.dispatch('fetchTotalAmount')
      })
    },
  },
}
</script>

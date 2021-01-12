<template>
  <div class="relative mr-3">
    <div class="quantity-toggle">
      <button class="focus:outline-none" @click="decrement()">
        &mdash;
      </button>
      <input
        class="focus:outline-none"
        type="text"
        :value="quantity"
        name="quantity"
        readonly
      />
      <button class="focus:outline-none" @click="increment()">
        &#xff0b;
      </button>
    </div>
    <span
      v-if="msg.length"
      class="text-xs text-red-500 absolute bottom-0 transform translate-y-5"
    >
      {{ msg }}
    </span>
  </div>
</template>

<script>
export default {
  props: {
    product_id: Number,
    product_price: Number,
    product_quantity: Number,
  },
  data() {
    return {
      quantity: 1,
      msg: '',
    }
  },
  mounted() {
    if (this.product_quantity > 0) {
      this.quantity = this.product_quantity
    }
  },
  methods: {
    increment() {
      if (this.quantity === 20 || this.quantity > 20) {
        return (this.msg = 'Max quantity')
      } else {
        this.quantity++
        this.msg = ''
        this.$store.dispatch('updateCartItems', {
          id: this.product_id,
          value: this.quantity,
          price: this.product_price,
        })
        this.$store.dispatch('fetchTotalAmount')
      }
    },
    decrement() {
      if (this.quantity === 1) {
        this.msg = '- Not Allowed'
        return
      } else {
        this.msg = ''
        this.quantity--
        this.$store.dispatch('updateCartItems', {
          id: this.product_id,
          value: this.quantity,
          price: this.product_price,
        })
        this.$store.dispatch('fetchTotalAmount')
      }
    },
  },
}
</script>

<style scoped>
pre {
  background: #eee;
  padding: 1rem;
  border-radius: 5px;
}

.quantity-toggle {
  display: flex;
}
.quantity-toggle input {
  border: 0;
  border-top: 2px solid #ddd;
  border-bottom: 2px solid #ddd;
  width: 2.5rem;
  text-align: center;
  padding: 0 0.5rem;
}
.quantity-toggle button {
  border: 1px solid rgba(121, 120, 120, 0.219);
  padding: 0.5rem;
  background: #ffffff;
  color: rgb(0, 0, 0);
  font-size: 1rem;
  cursor: pointer;
}
.quantity-toggle button:hover {
  color: turquoise;
}
</style>

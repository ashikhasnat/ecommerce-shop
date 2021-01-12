<template>
  <div class="">
    <div class="flex" v-if="cart_option">
      <!-- Quantity -->
      <div class="relative mr-3">
        <div class="quantity-toggle">
          <button class="focus:outline-none" @click="decrement()">
            &mdash;
          </button>
          <input
            class="focus:outline-none"
            type="text"
            :value="quantity"
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
      <button
        @click="postToCart(price)"
        class="text-white outline-none focus:outline-none bg-teal-400 py-2 px-5 text-xs sm:text-sm w-max-content uppercase"
      >
        add to cart
      </button>
    </div>
    <div
      @click="postToCart(price)"
      v-else
      class="cursor-pointer bg-white flex justify-center items-center w-10 h-10 text-gray-700 hover:text-white rounded-full text-center hover:bg-red-500 mr-1"
    >
      <i class="fas fa-shopping-bag text-lg"></i>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      quantity: 1,
      msg: '',
    }
  },
  props: {
    auth_id: {
      type: Number,
      default: null,
    },
    product_id: Number,
    price: Number,
    cart_option: Boolean,
  },
  methods: {
    postToCart(price) {
      axios
        .post(`/api/cart/${this.product_id}`, {
          product_id: this.product_id,
          quantity: this.quantity,
          price: price,
        })
        .then((res) => {
          this.$store.dispatch('fetchCartItemTotal')
          this.$store.commit('setClasses', 'success')
          this.$store.commit('setToastrMsg', 'Added Cart')
          setTimeout(() => {
            this.$store.commit('setToastrMsg', '')
          }, 3000)
          // this.data = res.data
        })
        .catch((e) => {
          if (this.auth_id == null) {
            // Request made and server responded
            this.$store.commit('setClasses', 'error')
            this.$store.commit('setToastrMsg', 'Log In First')
            setTimeout(() => {
              this.$store.commit('setToastrMsg', '')
            }, 5000)
            return
          }
        })
    },
    increment() {
      this.quantity++
      this.msg = ''
    },
    decrement() {
      if (this.quantity === 1) {
        this.msg = '- Not Allowed'
      } else {
        this.msg = ''
        this.quantity--
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

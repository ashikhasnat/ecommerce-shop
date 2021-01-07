<template>
  <div class="relative">
    <div class="quantity-toggle">
      <button class="focus:outline-none" @click="decrement()">&mdash;</button>
      <input
        class="focus:outline-none"
        type="text"
        :value="quantity"
        readonly
      />
      <button class="focus:outline-none" @click="increment()">&#xff0b;</button>
    </div>
    <span
      v-if="msg.length"
      class="text-xs text-red-500 absolute bottom-0 transform translate-y-5"
      >{{ msg }}</span
    >
  </div>
</template>

<script>
    export default {

  data() {
    return {
      quantity: 1,
      msg: ''
      };
  },
  methods: {
    increment() {
      this.quantity++;
      this.msg = ''
    },
    decrement() {
      if (this.quantity === 1) {
        this.msg = '- Not Allowed';
      } else {
        this.msg = ''
        this.quantity--;
      }
    } } 
    }
</script>

<style>
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
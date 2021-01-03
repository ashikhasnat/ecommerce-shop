<template>
  <div>
    <ul class="mr-4">
      <li
        class="flex items-center font-semibold bg-gray-700 px-5 uppercase cursor-pointer"
      >
        <i class="fas fa-bars mr-3"></i>
        <p @click="showDropdown()" class="py-4">Browse Accessories</p>
      </li>
      <li v-if="show" class="relative" :class="[show ? '' : 'hidden']">
        <slot name="dropdown-item"></slot>
      </li>
    </ul>
  </div>
</template>

<script>
    export default {
        data() {
            return {
                show: false
            }
        },
        methods: {
            showDropdown() {
                this.show = !this.show
            }
        },
    }
</script>

<template>
  <div class="flex items-center">
    <ul class="mr-4">
      <li
        @click="showDropdown()"
        class="flex items-center font-semibold bg-gray-700 px-3 sm:px-5 uppercase cursor-pointer"
      >
        <i class="fas fa-bars mr-3"></i>
        <p class="py-5 sm:py-4 text-xs sm:text-base">Browse Accessories</p>
      </li>
      <li
        v-if="show"
        class="relative"
        :class="[show ? 'visible' : 'invisible']"
      >
        <slot name="dropdown-item"></slot>
      </li>
    </ul>
    <p
      @click="showMenuNav()"
      class="block absolute right-2 font-semibold border-t border-b py-px uppercase md:hidden"
    >
      Menu
    </p>
    <div
      v-if="showMenu"
      class="w-64 bg-white box-shadow text-gray-900 z-50 fixed flex-none h-full top-0 bottom-0 right-0"
    >
      <p class="mt-10 py-3 px-6 bg-teal-400 text-white" @click="showMenuNav()">
        <i class="fas fa-times"></i>
        Close
      </p>
      <ul slot="menu" class="md:flex font-semibold uppercase text-sm mt-5">
        <li
          class="py-5 px-6 hover:text-gray-800 border-t border-b border-gray-100"
        >
          <a href="/">Home</a>
        </li>
        <li
          class="py-5 px-6 hover:text-gray-800 border-t border-b border-gray-100"
        >
          <a href="/shop">Shop</a>
        </li>
        <li
          class="py-5 px-6 hover:text-gray-800 border-t border-b border-gray-100"
        >
          <a href="/brand">Brands</a>
        </li>
        <li
          class="py-5 px-6 hover:text-gray-800 border-t border-b border-gray-100"
        >
          <a href="">Contact Us</a>
        </li>
      </ul>
    </div>
    <slot name="menu"></slot>
  </div>
</template>

<script>
export default {
  data() {
    return {
      show: false,
      showMenu: false,
    }
  },
  methods: {
    showDropdown() {
      this.show = !this.show
    },
    showMenuNav() {
      this.showMenu = !this.showMenu
    },
  },
}
</script>

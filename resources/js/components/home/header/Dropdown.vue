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
        <ul
          :class="[show ? 'visible' : 'invisible']"
          class="absolute text-black w-full text-xs sm:text-sm z-50 bg-white"
          style="box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.144);"
        >
          <li
            v-for="(category, i) in categories"
            :key="i"
            class="category border-b border-r border-l px-4 py-3 transition-colors duration-150 ease-linear relative"
          >
            <a :href="'/shop/category/' + category.slug">
              {{ category.name }}
            </a>

            <i
              v-if="category.subcategories.length > 0"
              style="font-size: 9px;"
              class="fas fa-chevron-right absolute right-3 bottom-4 text-gray-500"
            ></i>

            <ul
              v-if="category.subcategories.length > 0"
              class="subcategory absolute w-full right-0 top-0 px-2 py-1 bg-white"
            >
              <li
                v-for="(subcategory, i) in category.subcategories"
                :key="i"
                class="my-3 transition-colors duration-150 ease-linear"
              >
                <a :href="'/shop/subcategory/' + subcategory.slug">
                  {{ subcategory.name }}
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- <slot name="dropdown-item"></slot> -->
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
      <ul slot="menu" class="md:flex font-semibold uppercase text-sm mt-2">
        <li class="py-4 px-6 hover:text-gray-800 border-b border-gray-100">
          <a href="/">Home</a>
        </li>
        <li
          class="py-4 px-6 hover:text-gray-800 border-t border-b border-gray-100"
        >
          <a href="/shop">Shop</a>
        </li>
        <li
          class="py-4 px-6 hover:text-gray-800 border-t border-b border-gray-100"
        >
          <a href="/brand">Brands</a>
        </li>
        <li class="py-4 px-6 hover:text-gray-800 border-t border-gray-100">
          <a href="">Contact Us</a>
        </li>
      </ul>
    </div>
    <slot name="menu"></slot>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  mounted() {
    this.fetchCategories()
    setTimeout(() => {}, 2000)
  },
  data() {
    return {
      show: false,
      showMenu: false,
      categories: null,
      showCategory: false,
    }
  },
  methods: {
    fetchCategories() {
      axios.get('/api/categories').then((res) => {
        this.categories = res.data
      })
    },
    showDropdown() {
      this.show = !this.show
    },
    showMenuNav() {
      this.showMenu = !this.showMenu
    },
  },
}
</script>

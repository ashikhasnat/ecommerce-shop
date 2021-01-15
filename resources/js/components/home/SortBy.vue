<template>
  <div class="text-sm text-gray-500 relative">
    <p @click="showSortBy()" class="px-5 py-1 border cursor-pointer">
      Default Sorting
      <i
        :class="[SortShow ? 'rotate-180' : ' rotate-0']"
        class="fas fa-chevron-down transform ml-1 text-xs transition-all duration-200 ease-linear"
      ></i>
    </p>
    <ul
      class="absolute top-8 shadow-md bg-white z-50 border transition-all duration-200 ease-linear w-max-content p-3 right-0"
      :class="[SortShow ? 'visible opacity-100' : 'invisible opacity-0']"
    >
      <slot name="sort-item"></slot>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      SortShow: false,
    }
  },
  methods: {
    showSortBy() {
      this.SortShow = !this.SortShow
    },
  },
}
</script>

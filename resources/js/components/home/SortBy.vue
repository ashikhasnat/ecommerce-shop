<template>
  <div class="text-sm text-gray-500 relative">
    <p @click="showSortBy()" class="px-5 py-1 border cursor-pointer">
      {{ textToShow }}
      <i
        :class="[SortShow ? 'rotate-180' : ' rotate-0']"
        class="fas fa-chevron-down transform ml-1 text-xs transition-all duration-200 ease-linear"
      ></i>
    </p>
    <ul
      class="absolute top-8 shadow-md bg-white z-50 border transition-all duration-200 ease-linear w-max-content p-3 right-0"
      :class="[SortShow ? 'visible opacity-100' : 'invisible opacity-0']"
    >
      <li class="py-1 hover:text-teal-400">
        <a href="?sort=asc">
          {{ SortText[0] }}
        </a>
      </li>
      <li class="py-1 hover:text-teal-400">
        <a href="?sort=desc">{{ SortText[1] }}</a>
      </li>
      <li class="py-1 hover:text-teal-400">
        <a href="?price=asc">{{ SortText[2] }}</a>
      </li>
      <li class="py-1 hover:text-teal-400">
        <a href="?price=desc">{{ SortText[3] }}</a>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  mounted() {
    this.sortBy()
  },
  data() {
    return {
      SortShow: false,
      textToShow: '',
      SortText: [
        'Sort By Name: A-Z',
        'Sort By Name: Z-A',
        'Sort By Price: Low To High',
        'Sort By Price: High To Low',
      ],
    }
  },
  methods: {
    showSortBy() {
      this.SortShow = !this.SortShow
    },
    selectSortText() {
      console.log(this.$refs)
    },
    sortBy() {
      const queryString = window.location.search
      if (queryString == '?sort=asc') {
        this.textToShow = this.SortText[0]
      } else if (queryString == '?sort=desc') {
        this.textToShow = this.SortText[1]
      } else if (queryString == '?price=asc') {
        this.textToShow = this.SortText[2]
      } else if (queryString == '?price=desc') {
        this.textToShow = this.SortText[3]
      } else {
        this.textToShow = 'Default Sorting'
      }
    },
  },
}
</script>

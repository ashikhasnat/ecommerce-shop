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
      <li class="py-1 hover:text-teal-400" v-for="(sort, i) in sorts" :key="i">
        <a :href="sort.link">
          {{ sort.text }}
        </a>
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
      sorts: [
        { text: 'Sort By Name: A-Z', link: '?sort=asc' },
        { text: 'Sort By Name: Z-A', link: '?sort=desc' },
        { text: 'Sort By Price: Low To High', link: '?price=asc' },
        { text: 'Sort By Price: High To Low', link: '?price=desc' },
      ],
    }
  },
  methods: {
    showSortBy() {
      this.SortShow = !this.SortShow
    },
    queryString(string) {
      return window.location.search.includes(string)
    },
    sortBy() {
      if (this.queryString(this.sorts[0].link)) {
        return (this.textToShow = this.sorts[0].text)
      } else if (this.queryString(this.sorts[1].link)) {
        return (this.textToShow = this.sorts[1].text)
      } else if (this.queryString(this.sorts[2].link)) {
        return (this.textToShow = this.sorts[2].text)
      } else if (this.queryString(this.sorts[3].link)) {
        return (this.textToShow = this.sorts[3].text)
      } else {
        return (this.textToShow = 'Default Sorting')
      }
    },
  },
}
</script>

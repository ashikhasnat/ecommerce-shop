<template>
  <div>
    <div class="flex flex-col" v-if="datas">
      <div class="">
        <label
          for="category_id"
          class="text-base my-2 font-medium leading-5 text-gray-700 block"
        >
          Select Category
        </label>
        <select
          @change="categoryData()"
          v-model.number="categoryId"
          id="category_id"
          name="category_id"
          class="mt-1 mr-1 py-2 px-3 border w-full border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm sm:leading-5"
        >
          <option value="" disabled selected>Select Category</option>
          <option :value="data.id" v-for="data in datas" :key="data.id">
            {{ data.name }}
          </option>
        </select>
      </div>
      <!-- genres -->

      <div class="" v-if="categoryId">
        <div class="" v-if="subcategories">
          <h1 class="font-semibold my-1 p2">Select SubCategory</h1>
          <select
            id="sub_category_id"
            name="sub_category_id"
            class="mt-1 mr-1 py-2 px-3 border w-full border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm sm:leading-5"
          >
            <option value="" disabled selected>Select Category</option>
            <option
              :value="subcategory.id"
              v-for="subcategory in subcategories"
              :key="subcategory.id"
            >
              {{ subcategory.name }}
            </option>
          </select>
        </div>
        <div class="text-red-600 text-sm my-1 p2" v-else>
          <p>No SubCategories Found</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from 'axios'
export default {
  data() {
    return {
      datas: null,
      categoryId: '',
      subcategories: null,
    }
  },
  mounted() {
    this.fetchData()
  },
  methods: {
    fetchData() {
      Axios.get('/api/dashboard/category').then((res) => {
        this.datas = res.data
      })
    },
    categoryData() {
      if (this.categoryId) {
        Axios.get(`/api/dashboard/category/${this.categoryId}`).then((res) => {
          this.subcategories = res.data
          this.$forceUpdate()
        })
      }
    },
  },
}
</script>

<template>
  <div>
    <div class="flex flex-col" v-if="datas">
      <div class="" v-if="catId">
        <label
          for="category_id"
          class="text-base my-2 font-medium leading-5 text-gray-700 block"
        >
          Select Category props
        </label>
        <select
          @change="categoryData()"
          v-model.number="categoryId"
          id="category_id"
          name="category_id"
          class="mt-1 mr-1 py-2 px-3 border w-full border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm sm:leading-5"
        >
          <!-- <option value="" disabled selected>Select Category</option> -->
          <option
            :value="data.id"
            v-for="data in datas"
            :key="data.id"
            :selected="data.id == categoryId ? 'selected' : ''"
          >
            {{ data.name }}
          </option>
        </select>
      </div>

      <!-- SubCategory-->
      <div class="" v-if="subcategories">
        <div class="">
          <h1 class="font-semibold my-1 p2">Select SubCategory</h1>
          <select
            id="sub_category_id"
            name="sub_category_id"
            class="mt-1 mr-1 py-2 px-3 border w-full border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm sm:leading-5"
          >
            <!-- <option value="" disabled selected>Select SubCategory</option> -->
            <option
              v-for="subcategory in data.subcategories"
              :value="subcategory.id"
              :key="subcategory.id"
              :selected="subcategory.id == subcategoryId ? 'selected' : ''"
            >
              {{ subcategory.name }}
            </option>
          </select>
        </div>
        <div class="text-red-600 text-sm my-1 p2">
          <p>No SubCategories Found</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from 'axios'
export default {
  props: {
    catId: {
      type: [Number, String],
    },
    subCatId: {
      type: [Number, String],
    },
  },
  data() {
    return {
      datas: null,
      categoryId: this.catId,
      subcategoryId: this.subCatId,
      subcategories: null,
    }
  },
  mounted() {
    this.fetchData()
    this.categoryData()
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

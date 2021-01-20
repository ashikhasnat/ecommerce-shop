<template>
  <div class="">
    <div class="my-2">
      <div class="">
        <label for="short_details" class="font-medium leading-5 text-gray-700">
          Short Description
        </label>
        <vue-editor
          class="mt-3"
          v-model="shortDetails"
          placeholder="Short Description"
        />
        <textarea
          class="mt-1 hidden form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
          name="short_details"
          id="short_details"
          placeholder="Short Description"
          v-model="shortDetails"
        ></textarea>
      </div>
      <div class="my-2">
        <label for="long_details" class="font-medium leading-5 text-gray-700">
          Long Description
        </label>
        <vue-editor
          class="mt-3"
          v-model="longDetails"
          placeholder="long Description"
        />
        <textarea
          class="mt-1 hidden form-input w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
          name="long_details"
          id="long_details"
          placeholder="Long Description"
          v-model="longDetails"
        ></textarea>
      </div>
    </div>
  </div>
</template>

<script>
import { VueEditor } from 'vue2-editor'
export default {
  props: {
    old_short_Details: {
      type: String,
      default: '',
    },
  },
  data() {
    return {
      shortDetails: '',
      longDetails: '',
    }
  },
  components: { VueEditor },
}
</script>

<style></style>

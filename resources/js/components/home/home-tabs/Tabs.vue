<template>
  <div>
    <div class="flex justify-center sm:justify-end">
      <ul class="flex text-xs sm:text-base font-semibold uppercase">
        <li
          v-for="(tab, i) in tabs"
          :key="i"
          :class="{ 'text-white bg-teal-400  hover:text-white': tab.isActive }"
          class="mx-1 py-1 px-3 md:mx-5 mb-8 hover:opacity-75 transition-colors duration-150 ease-linear"
        >
          <div class="cursor-pointer" @click="selectTab(tab)">
            {{ tab.name }}
          </div>
        </li>
      </ul>
    </div>

    <div class="tabs-details">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return { tabs: [] }
  },
  created() {
    this.tabs = this.$children
  },
  methods: {
    selectTab(selectedTab) {
      this.tabs.forEach((tab) => {
        tab.isActive = tab.name == selectedTab.name
      })
    },
  },
}
</script>

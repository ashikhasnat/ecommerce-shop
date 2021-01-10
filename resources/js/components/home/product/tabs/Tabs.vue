<template>
  <div>
    <div class="flex justify-center">
      <ul class="flex text-base lg:text-xl font-bold uppercase">
        <li
          v-for="(tab, i) in tabs"
          :key="i"
          :class="{ ' text-teal-400': tab.isActive }"
          class="mx-1 md:mx-5 mb-6 hover:text-teal-300 transition-colors duration-150 ease-linear"
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
    return { tabs: [] };
  },

  created() {

    this.tabs = this.$children;

  },
  methods: {
    selectTab(selectedTab) {
      this.tabs.forEach(tab => {
        tab.isActive = tab.name == selectedTab.name;
      });
    } } 

    }
</script>
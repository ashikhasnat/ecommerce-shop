<template>
  <div class="grid grid-cols-7 h-screen relative">
    <div class="profile col-span-1 bg-gray-800" :class="[show ? '' : 'hidden']">
      <slot v-if="show" name="col-1"> </slot>
    </div>
    <i
      @click="showSidebar()"
      class="text-4xl top-4 ml-px absolute left-4 cursor-pointer transition duration-300 ease-in-out"
      :class="[show ? 'fas fa-times text-white' : 'fas fa-bars text-black ']"
    ></i>
    <div :class="[show ? 'col-span-6' : 'col-span-7']">
      <slot name="col-5"></slot>
    </div>
  </div>
</template>

<script>
    export default {
        data () {
            return {
                show: true,
            }
        },
        methods: {
            showSidebar() {
                this.show = !this.show
            }
        },
    }
</script>

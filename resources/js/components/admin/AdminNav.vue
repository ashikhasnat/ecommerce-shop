<template>
  <div class="grid grid-cols-6 h-screen relative">
    <slot v-if="show" name="col-1"> </slot>
    <i
      @click="showSidebar()"
      class="text-4xl top-4 ml-px absolute left-4 cursor-pointer transition duration-300 ease-in-out"
      :class="[show ? 'fas fa-bars text-white' : 'fas fa-times text-black ']"
    ></i>
    <div :class="[show ? 'col-span-5' : 'col-span-6']">
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

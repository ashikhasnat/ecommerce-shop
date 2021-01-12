<template>
  <div class="fixed top-5 right-5 box-shadow-xl rounded" :class="getClasses">
    <div
      class="py-2 w-72 flex justify-between items-center"
      v-if="getToastrMsg.length > 0"
    >
      <p class="ml-2">{{ getToastrMsg }}</p>
      <i
        @click="$store.commit('setToastrMsg', '')"
        class="far fa-times-circle text-lg mr-2 cursor-pointer"
      ></i>
    </div>
    <div
      class="py-2 w-72 flex justify-between items-center"
      :class="text_classes"
      v-if="(text_msg.length > 0) & (remove_msg.length != 0)"
    >
      <p class="ml-2">{{ text_msg }}</p>
      <i
        @click="emptyMsg"
        class="far fa-times-circle text-lg mr-2 cursor-pointer"
      ></i>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  props: {
    text_msg: '',
    text_classes: '',
  },
  data() {
    return {
      remove_msg: 'null',
    }
  },
  methods: {
    emptyMsg() {
      if (this.text_msg.length > 0) {
        return (this.remove_msg = '')
      }
    },
  },
  computed: {
    ...mapGetters({
      getToastrMsg: 'getToastrMsg',
      getClasses: 'getClasses',
    }),
  },
}
</script>

<template>
  <div>
    <tabs>
      <tab name="Description">
        <slot name="description"></slot>
      </tab>
      <tab name="Additional Information">
        <slot name="info"></slot>
      </tab>
      <tab name="Review" :selected="true">
        <slot name="review"></slot>
      </tab>
      <tab name="More Product">
        <slot name="more-product"></slot>
      </tab>
    </tabs>
  </div>
</template>

<script>
import Tab from './tabs/Tab.vue'
import Tabs from './tabs/Tabs.vue'
export default {
  components: { Tab, Tabs },
}
</script>

<style></style>

<template>
  <div>
    <tabs>
      <tab name="Latest Products" :selected="true">
        <slot name="latest-products"></slot>
      </tab>
      <tab name="Top Rated">
        <slot name="top-rated"></slot>
      </tab>
    </tabs>
  </div>
</template>

<script>
import Tab from './product/tabs/Tab'
import Tabs from './home-tabs/Tabs'
export default {
  components: { Tab, Tabs },
}
</script>

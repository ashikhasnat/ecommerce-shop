import Vue from 'vue'
import App from './components/App.vue'
import AdminNav from './components/admin/AdminNav.vue'
import SelectCategory from './components/admin/product/SelectCategory.vue'
import ProductDetails from './components/admin/product/ProductDetails.vue'
import Dropdown from './components/home/Dropdown.vue'
import Slider from './components/home/Slider.vue'
require('./bootstrap')

const app = new Vue({
  el: '#app',
  components: {
    App,
    AdminNav,
    ProductDetails,
    SelectCategory,
    Dropdown,
    Slider,
  },
})

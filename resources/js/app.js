import Vue from 'vue'
import App from './components/App.vue'
import AdminNav from './components/admin/AdminNav.vue'
require('./bootstrap')

const app = new Vue({
  el: '#app',
  components: {
    App,
    AdminNav,
  },
})

import Vue from 'vue'
import Vuex from 'vuex'
import Wishlist from './modules/wishlist.js'
Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    Wishlist,
  },
})

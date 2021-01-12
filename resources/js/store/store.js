import Vue from 'vue'
import Vuex from 'vuex'
import Wishlist from './modules/wishlist.js'
import Cart from './modules/cart.js'
import Toastr from './modules/toastr.js'
Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    Wishlist,
    Cart,
    Toastr,
  },
})

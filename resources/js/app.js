import Vue from 'vue'
import store from './store/store.js'
import App from './components/App.vue'
import AdminNav from './components/admin/AdminNav.vue'
import SelectCategory from './components/admin/product/SelectCategory.vue'
import ProductDetails from './components/admin/product/ProductDetails.vue'
import Dropdown from './components/home/header/Dropdown.vue'
import AccountDetails from './components/home/header/AccountDetails.vue'
import Slider from './components/home/Slider.vue'
import CountDown from './components/home/CountDown.vue'
import ProductCountDown from './components/home/product/ProductCountDown.vue'
import ProductSlider from './components/home/product/ProductSlider.vue'
import Quantity from './components/home/product/Quantity.vue'
import OtherProductInfo from './components/home/product/OtherInfoTab.vue'
import Ratings from './components/home/product/Rating.vue'
import AddToWishlist from './components/home/wishlist/AddToWishlist.vue'
import AddToWishlistHome from './components/home/wishlist/AddToWishlistHome.vue'
import WishlistShow from './components/home/wishlist/WishlistShow.vue'
require('./bootstrap')

const app = new Vue({
  el: '#app',
  components: {
    App,
    AdminNav,
    ProductDetails,
    SelectCategory,
    Dropdown,
    AccountDetails,
    Slider,
    CountDown,
    ProductSlider,
    Quantity,
    ProductCountDown,
    OtherProductInfo,
    Ratings,
    AddToWishlist,
    AddToWishlistHome,
    WishlistShow,
  },
  store,
})

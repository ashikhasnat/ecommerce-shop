import Vue from 'vue'
import store from './store/store.js'
import App from './components/App.vue'
import AdminNav from './components/admin/AdminNav.vue'
import SearchBar from './components/home/header/Search.vue'
import SelectCategory from './components/admin/product/SelectCategory.vue'
import EditSelectCategory from './components/admin/product/EditSelectCategory.vue'
import Dropdown from './components/home/header/Dropdown.vue'
import SortBy from './components/home/SortBy.vue'
import AccountDetails from './components/home/header/AccountDetails.vue'
import Slider from './components/home/Slider.vue'
import CountDown from './components/home/CountDown.vue'
import ProductCountDown from './components/home/product/ProductCountDown.vue'
import ProductSlider from './components/home/product/ProductSlider.vue'
import OtherProductInfo from './components/home/product/OtherInfoTab.vue'
import Ratings from './components/home/product/Rating.vue'
import AddToWishlist from './components/home/wishlist/AddToWishlist.vue'
import AddToWishlistHome from './components/home/wishlist/AddToWishlistHome.vue'
import WishlistShow from './components/home/wishlist/WishlistShow.vue'
import TopRatedAndSeller from './components/home/TopRatedAndLatest.vue'
import CartShow from './components/home/cart/CartShow.vue'
import CartClear from './components/home/cart/ClearCart.vue'
import AddToCart from './components/home/cart/AddToCart.vue'
import CheckOut from './components/home/checkout/CheckOut.vue'
import Toastr from './components/home/header/Toastr.vue'
require('./bootstrap')
Vue.mixin({
  methods: {
    convertToCurrency(price, type = 'bn-BD', currency = 'BDT') {
      price = price / 100
      return price.toLocaleString(type, {
        style: 'currency',
        currency: currency,
      })
    },
  },
})
const app = new Vue({
  el: '#app',
  components: {
    App,
    Toastr,
    AdminNav,
    SearchBar,
    SelectCategory,
    EditSelectCategory,
    Dropdown,
    SortBy,
    AccountDetails,
    Slider,
    CountDown,
    ProductSlider,
    ProductCountDown,
    OtherProductInfo,
    Ratings,
    AddToWishlist,
    AddToWishlistHome,
    WishlistShow,
    TopRatedAndSeller,
    CartShow,
    CheckOut,
    AddToCart,
    CartClear,
  },
  store,
})

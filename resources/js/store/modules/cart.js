import axios from 'axios'

const state = {
  cartItems: [],
  totalAmount: '',
}

const mutations = {
  setCartItem(state, cartItems) {
    state.cartItems = cartItems
  },
  setTotalAmount(state, totalAmount) {
    state.totalAmount = totalAmount
  },
}

const actions = {
  fetchCartItemTotal({ commit }) {
    axios.get('/api/cart').then((res) => {
      commit('setCartItem', res.data)
      // this.data = res.data
    })
  },
  fetchTotalAmount({ commit }) {
    axios.get('/api/cart-total-amount').then((res) => {
      commit('setTotalAmount', res.data)
    })
  },
  updateCartItems({ commit, dispatch }, { id, value, price }) {
    axios
      .put(`/api/cart/${id}`, {
        quantity: value,
        price: price,
      })
      .then((res) => {
        commit('setClasses', 'info')
        commit('setToastrMsg', 'Updated the Cart')
        dispatch('fetchCartItemTotal')
        setTimeout(() => {
          commit('setToastrMsg', '')
        }, 3000)
      })
  },
}

const getters = {
  CartItemLength: (state) => {
    return Object.entries(state.cartItems).length
  },
  AllCartItem: (state) => {
    return state.cartItems
  },
  getTotalAmount: (state) => {
    return state.totalAmount
  },
  
}

export default {
  state,
  mutations,
  actions,
  getters,
}

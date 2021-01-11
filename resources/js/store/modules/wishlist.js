import axios from 'axios'

const state = {
  data: '',
}

const mutations = {
  setData(state, data) {
    state.data = data
  },
}

const actions = {
  fetchWishlistDataTotal({ commit }) {
    axios.get('/api/wishlist').then((res) => {
      commit('setData', res.data)
      // this.data = res.data
    })
  },
}
const getters = {
  wishlistDataLength: (state) => {
    return state.data.length
  },
}

export default {
  state,
  mutations,
  actions,
  getters,
}

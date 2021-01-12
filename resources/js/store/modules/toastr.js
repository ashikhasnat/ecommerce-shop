const state = {
  toastrMsg: '',
  classes: '',
}

const mutations = {
  setToastrMsg(state, toastrMsg) {
    state.toastrMsg = toastrMsg
  },
  setClasses(state, classes) {
    state.classes = classes
  },
}
const actions = {
  fetchToastrMsg({ commit }, msg) {
    commit('setToastrMsg', msg)
  },
}
const getters = {
  getToastrMsg: (state) => {
    return state.toastrMsg
  },
  getClasses: (state) => {
    return state.classes
  },
}
export default {
  state,
  mutations,
  actions,
  getters,
}

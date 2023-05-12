import {createStore} from 'vuex';

const store = createStore({
  state: {
    drawer: false,
    history: localStorage.getItem('history') || null
  },
  mutations: {
    SET_DRAWER (state, payload) {
      state.drawer = payload
    },
    SET_HISTORY(state , history){
      state.history = history
    }
  },
  getters:{
    drawer:state=>state.drawer,
    getHistory:state=>state.history
  },
  actions: {
    switchDrawer({state,commit, dispatch},drawer){
      commit('SET_DRAWER',drawer)
    },
    createHistory({state,commit, dispatch},history){
      commit('SET_HISTORY',history)
    },
  }
})

export default store;
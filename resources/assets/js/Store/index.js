import Vue from 'vue'
import Vuex from 'vuex'
import User from '@/Store/Modules/User'
import Request from '@/Store/Modules/Request'
import Artist from '@/Store/Modules/Artist'
import Place from '@/Store/Modules/Place'
import mutations from './Mutations'
import actions from './Actions'
// import getters from './getters'

Vue.use(Vuex)

export default new Vuex.Store({
  strict: true,
  state: {},
  mutations,
  actions,
  // getters,
  modules: {
    Request,
    Artist,
    Place,
    User
  }
})

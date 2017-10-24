import Vue from 'vue'
import router from '@/Router'
import Places from '@/Http/API/Places'
import axios from '@/Http'

/**
 * The Place module state.
 * ------------------------------
 * @const state {Object}
 */
const state = {

  /**
   * All the Places
   * loaded on the plataform.
   * ------------------------------
   * @member all {Object}
  */
  all: {},

  /**
   * The array of Places id's.
   * ------------------------------
   * @member {array}
   */
  list: [],

  /**
   * The selected Place.
   * ------------------------------
   * @member {int}
   */
  selected: null
}

/**
 * The Actions related to the
 * Places Entities.
 * ------------------------------
 * @const {Object} actions
 */
const actions = {

  /**
   * Make the login Place and commit the 'login' mutation on success.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @param {credentials} | The Place and pass to make the login Place.
   * @return {Promise}
   */
  getPlaces: ({ commit }, fields) =>
  new Promise((resolve, reject) => {
    Places.get(fields).then(({ data }) => {
      commit('fetchPlaces', data)
      resolve(data)
    }).catch(err => reject(err))
  }),

  /**
   * Make the login Place and commit the 'login' mutation on success.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @param {credentials} | The Place and pass to make the login Place.
   * @return {Promise}
   */
  storePlace: ({ commit }, place) =>
  new Promise((resolve, reject) => {
    Places.store(place).then(({ data }) => {
      commit('fetchPlace', data)
      resolve(data)
    }).catch(err => reject(err))
  })
}

const mutations = {

  /**
   * Update the Place.me and the Place on localstorage.
   *
   * @param state {Object} The Place module state.
   * @param Place {Object} The current logged Place data.
   */
  fetchPlace (state, Place) {
    Vue.set(state.all, Place.id, Place)
  },

  /**
   * Update the Place.me and the Place on localstorage.
   *
   * @param state {Object} The Place module state.
   * @param Place {Object} The current logged Place data.
   */
  fetchPlaces (state, Places) {
    state.list = Places.map(r => r.id)
    for (var Place of Places) {
      Vue.set(state.all, Place.id, Place)
    }
  }
}

// /**
//  * The getters of the Place module.
//  * @const {Object}
//  */
// const getters = {
// }

export default {
  state,
  actions,
  mutations
  // getters,
  // isAdmin,
}

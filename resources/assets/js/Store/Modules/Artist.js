import Vue from 'vue'
import router from '@/Router'
import Artists from '@/Http/API/Artists'
import axios from '@/Http'

/**
 * The Artist module state.
 * ------------------------------
 * @const state {Object}
 */
const state = {

  /**
   * All the Artists
   * loaded on the plataform.
   * ------------------------------
   * @member all {Object}
  */
  all: {},

  /**
   * The array of Artists id's.
   * ------------------------------
   * @member {array}
   */
  list: [],

  /**
   * The selected Artist.
   * ------------------------------
   * @member {int}
   */
  selected: null
}

/**
 * The Actions related to the
 * Artists Entities.
 * ------------------------------
 * @const {Object} actions
 */
const actions = {

  /**
   * Make the login Artist and commit the 'login' mutation on success.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @param {credentials} | The Artist and pass to make the login Artist.
   * @return {Promise}
   */
  getArtists: ({ commit }, fields) =>
  new Promise((resolve, reject) => {
    Artists.get(fields).then(({ data }) => {
      commit('fetchArtists', data)
      resolve(data)
    }).catch(err => reject(err))
  }),

  /**
   * Make the login Artist and commit the 'login' mutation on success.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @param {credentials} | The Artist and pass to make the login Artist.
   * @return {Promise}
   */
  myArtists: ({ commit }, fields) =>
  new Promise((resolve, reject) => {
    Artists.mine(fields).then(({ data }) => {
      commit('fetchArtists', data)
      resolve(data)
    }).catch(err => reject(err))
  }),

  /**
   * Make the login Artist and commit the 'login' mutation on success.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @param {credentials} | The Artist and pass to make the login Artist.
   * @return {Promise}
   */
  makeArtistAvailableOnPlace: ({ commit }, request) =>
  new Promise((resolve, reject) => {
    Artists.makeAvailableOnPlace(request).then(({ data }) => {
      commit('fetchArtists', data)
      resolve(data)
    }).catch(err => reject(err))
  })
}

const mutations = {

  /**
   * Update the Artist.me and the Artist on localstorage.
   *
   * @param state {Object} The Artist module state.
   * @param Artist {Object} The current logged Artist data.
   */
  fetchArtist (state, Artist) {
    Vue.set(state.all, Artist.id, Artist)
  },

  /**
   * Update the Artist.me and the Artist on localstorage.
   *
   * @param state {Object} The Artist module state.
   * @param Artist {Object} The current logged Artist data.
   */
  fetchArtists (state, Artists) {
    state.list = Artists.map(r => r.id)
    for (var Artist of Artists) {
      Vue.set(state.all, Artist.id, Artist)
    }
  }
}

// /**
//  * The getters of the Artist module.
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

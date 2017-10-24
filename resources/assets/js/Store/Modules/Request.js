import Vue from 'vue'
import router from '@/Router'
import Requests from '@/Http/API/Requests'
import axios from '@/Http'

/**
 * The Request module state.
 * ------------------------------
 * @const state {Object}
 */
const state = {

  /**
   * All the Requests
   * loaded on the plataform.
   * ------------------------------
   * @member all {Object}
  */
  all: {},

  /**
   * The array of Requests id's.
   * ------------------------------
   * @member {array}
   */
  list: [],

  /**
   * The selected Request.
   * ------------------------------
   * @member {int}
   */
  selected: null
}

/**
 * The Actions related to the
 * Requests Entities.
 * ------------------------------
 * @const {Object} actions
 */
const actions = {

  /**
   * Make the login request and commit the 'login' mutation on success.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @param {credentials} | The Request and pass to make the login request.
   * @return {Promise}
   */
  makeArtistRequest: ({ commit }, request) =>
  new Promise((resolve, reject) => {
    Requests.make(request).then(({ data }) => {
      commit('fetchRequest', data)
      resolve(data)
    }).catch(err => reject(err))
  }),

  /**
   * Make the login request and commit the 'login' mutation on success.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @param {credentials} | The Request and pass to make the login request.
   * @return {Promise}
   */
  getRequests: ({ commit }, fields) =>
  new Promise((resolve, reject) => {
    Requests.get(fields).then(({ data }) => {
      commit('fetchRequests', data)
      resolve(data)
    }).catch(err => reject(err))
  }),

  /**
   * Make the login request and commit the 'login' mutation on success.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @param {credentials} | The Request and pass to make the login request.
   * @return {Promise}
   */
  updateRequest: ({ commit }, request) =>
  new Promise((resolve, reject) => {
    Requests.update(request).then(({ data }) => {
      commit('fetchRequest', data)
      resolve(data)
    }).catch(err => reject(err))
  }),

  /**
   * Make the login request and commit the 'login' mutation on success.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @param {credentials} | The Request and pass to make the login request.
   * @return {Promise}
   */
  myRequests: ({ commit }) =>
  new Promise((resolve, reject) => {
    Requests.mine(request).then(({ data }) => {
      commit('fetchRequest', data)
      resolve(data)
    }).catch(err => reject(err))
  })
}

const mutations = {

  /**
   * Update the Request.me and the Request on localstorage.
   *
   * @param state {Object} The Request module state.
   * @param Request {Object} The current logged Request data.
   */
  fetchRequest (state, request) {
    Vue.set(state.all, request.id, request)
  },

  /**
   * Update the Request.me and the Request on localstorage.
   *
   * @param state {Object} The Request module state.
   * @param Request {Object} The current logged Request data.
   */
  fetchRequests (state, requests) {
    state.list = requests.map(r => r.id)
    for (var request of requests) {
      Vue.set(state.all, request.id, request)
    }
  }
}

// /**
//  * The getters of the Request module.
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

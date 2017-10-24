import Vue from 'vue'
// import categories from '@/api/categories'
// import entityMap from '@/store/EntityMap'
// import storeState from '@/store/state'
import router from '@/Router'
import Auth from '@/Http/API/Auth'
import Users from '@/Http/API/Users'
import axios from '@/Http'

/**
 * The User module state.
 * ------------------------------
 * @const state {Object}
 */
const state = {

  /**
   * The current logged user.
   * ------------------------------
   * @var me {Object}
   */
  me: null,

  /**
   * All the Products
   * loaded on the plataform.
   * ------------------------------
   * @var all {Object}
  */
  all: {},

  /**
   * The array of Products id's.
   * ------------------------------
   * @var {array}
   */
  list: [],

  /**
   * The selected Product.
   * ------------------------------
   * @var {int}
   */
  selected: null
}

// /**
//  * The Actions related to the
//  * Users Entities.
//  * ------------------------------
//  * @const
//  * @function
//  * @return {bool}
//  */
// const isAdmin = () => state.me && state.me.is_admin

/**
 * The Actions related to the
 * Users Entities.
 * ------------------------------
 * @const {Object} actions
 */
const actions = {

  /**
   * Make the login request and commit the 'login' mutation on success.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @param {credentials} | The user and pass to make the login request.
   * @return {Promise}
   */
  login ({ commit }, credentials) {
    return new Promise((resolve, reject) => {
      // Call to axios web and send a callback to quit the accept-JSON headers
      axios.web(() => {
        Auth.login(credentials).then(({ data }) => {
          // Commit the login mutation to store the User Object
          commit('login', data)
          resolve(data)
        }).catch(err => reject(err))
      })
    })
  },

//   /**
//    * Make the regirster request and commit the 'login' mutation on success.
//    *
//    * @param {commit} | the mutation dispatcher of the state.
//    * @param {user} | The user to register.
//    * @return {Promise}
//    */
//   register: ({ commit }, user) => new Promise((resolve, reject) => {
//     axios.web(() => {
//       Auth.register(user).then(({ data }) => {
//         commit('login', data)
//         resolve(data)
//       }).catch(error => reject(error))
//     })
//   }),

  /**
   * Make a 'me' request to the api and update the 'me' object
   * to the data on succes or a empty object on error 401.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @return {Promise}
   */
  me: ({ commit, dispatch }, load = []) => new Promise((resolve, reject) => {
    axios.web(() => {
      Auth.me(load).then(({ data }) => {
        // On Success action update the user
        commit('login', data)
        resolve(data)
      }).catch(error => {
        // On UnAuthorized action clean the user
        commit('logout')
        resolve(error)
      })
    })
  }),

  /**
   * Make the logout request and commit the 'logout' mutation on success.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @param {credentials} | The user and pass to make the login request.
   * @return {Promise}
   */
  logout ({ commit }) {
    axios.web(() => {
      Auth.logout().then(() => {
        commit('logout')
      })
    })
  },

//   /**
//    * Make the logout request and commit the 'logout' mutation on success.
//    *
//    * @param {commit} | the mutation dispatcher of the state.
//    * @param {credentials} | The user and pass to make the login request.
//    * @return {Promise}
//    */
//   loadUser: ({ dispatch }, { load = [], id }) =>
//   new Promise((resolve, reject) => {
//     Auth.loadUser(id, load).then(({ data }) => {
//       dispatch('loadEntities', data)
//       resolve(data)
//     })
//   })

  /**
   * Make the logout request and commit the 'logout' mutation on success.
   *
   * @param {commit} | the mutation dispatcher of the state.
   * @param {credentials} | The user and pass to make the login request.
   * @return {Promise}
   */
  getUsers: ({ dispatch }, params) =>
  new Promise((resolve, reject) => {
    Users.get(params).then(({ data }) => {
      // dispatch('fetchUsers', data)
      resolve(data)
    })
  })
}

const mutations = {

  /**
   * Update the User.me and the User on localstorage.
   *
   * @param state {Object} The User module state.
   * @param user {Object} The current logged user data.
   */
  login (state, user) {
    if (user && user.id) {
      state.me = user
      localStorage.setItem('User', JSON.stringify(user))
      Vue.set(state.all, user.id, user)
      state.list.push(user.id)
    }
  },

  /**
   * Clean the User.me and the User on localstorage.
   *
   * @param state {Object} The User module state.
   * @param redirect {String} The route to redirect the page.
   */
  logout (state, redirect = null) {
    if (state.me && state.me.id) {
      Vue.delete(state.me, state.me.id)
      state.list.splice(state.list.indexOf(state.me.id), 1)
    }
    state.me = null
    localStorage.removeItem('User')
    router.push(redirect || '/')
  },

  /**
   * Clean the User.me and the User on localstorage.
   *
   * @param state {Object} The User module state.
   * @param redirect {String} The route to redirect the page.
   */
  fetchUsers (state, users) {
    console.log(users)
    // state.all = {...state.all, ...users}
  }
}

// /**
//  * The getters of the User module.
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

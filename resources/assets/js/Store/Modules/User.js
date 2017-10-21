// import Vue from 'vue'
// import categories from '@/api/categories'
// import entityMap from '@/store/EntityMap'
// import storeState from '@/store/state'
// import router from '@/routes/router'
// import auth from '@/api/auth'

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

// /**
//  * The Actions related to the Users Entities.
//  *
//  * @const action {Object}
//  */
// const actions = {

//   /**
//    * Make the login request and commit the 'login' mutation on success.
//    *
//    * @param {commit} | the mutation dispatcher of the state.
//    * @param {credentials} | The user and pass to make the login request.
//    * @return {Promise}
//    */
//   login ({ commit }, credentials) {
//     return new Promise((resolve, reject) => {
//       // Call to axios web and send a callback to quit the accept-JSON headers
//       axios.web(() => {
//         auth.login(credentials).then(({ data }) => {
//           // Commit the login mutation to store the User Object
//           commit('login', data)
//           resolve(data)
//         }).catch(err => reject(err))
//       })
//     })
//   },

//   /**
//    * Make the regirster request and commit the 'login' mutation on success.
//    *
//    * @param {commit} | the mutation dispatcher of the state.
//    * @param {user} | The user to register.
//    * @return {Promise}
//    */
//   register: ({ commit }, user) => new Promise((resolve, reject) => {
//     axios.web(() => {
//       auth.register(user).then(({ data }) => {
//         commit('login', data)
//         resolve(data)
//       }).catch(error => reject(error))
//     })
//   }),

//   /**
//    * Make a 'me' request to the api and update the 'me' object
//    * to the data on succes or a empty object on error 401.
//    *
//    * @param {commit} | the mutation dispatcher of the state.
//    * @return {Promise}
//    */
//   me: ({ commit, dispatch }, load = []) => new Promise((resolve, reject) => {
//     axios.web(() => {
//       auth.me(load).then(({ data }) => {
//         // On Success action update the user
//         dispatch('loadEntities', data)
//         commit('login', data)
//         resolve(data)
//       }).catch(error => {
//         // On Unauthorized action clean the user
//         commit('logout')
//         resolve(error)
//       })//.then(() => dispatch('auth').then(to => console.debug(to)))//router.push(to)
//     })
//   }),

//   /**
//    * Make the logout request and commit the 'logout' mutation on success.
//    *
//    * @param {commit} | the mutation dispatcher of the state.
//    * @param {credentials} | The user and pass to make the login request.
//    * @return {Promise}
//    */
//   logout ({ commit }) {
//     axios.web(() => {
//       auth.logout().then(() => {
//         commit('logout')
//       })
//     })
//   },

//   /**
//    * Make the logout request and commit the 'logout' mutation on success.
//    *
//    * @param {commit} | the mutation dispatcher of the state.
//    * @param {credentials} | The user and pass to make the login request.
//    * @return {Promise}
//    */
//   loadUser: ({ dispatch }, { load = [], id }) =>
//   new Promise((resolve, reject) => {
//     auth.loadUser(id, load).then(({ data }) => {
//       dispatch('loadEntities', data)
//       resolve(data)
//     })
//   })
// }

// const mutations = {

//    /**
//    * Update the User.me and the User on localstorage.
//    *
//    * @param state {Object} The User module state.
//    * @param user {Object} The current logged user data.
//    */
//   login (state, user) {
//     state.me = user
//     localStorage.setItem('User', JSON.stringify(user))
//     if (user && user.id) {
//       Vue.set(state.all, user.id, user)
//       state.list.push(user.id)
//     }
//   },

//   /**
//    * Clean the User.me and the User on localstorage.
//    *
//    * @param state {Object} The User module state.
//    * @param redirect {String} The route to redirect the page.
//    */
//   logout (state, redirect = null) {
//     if (state.me && state.me.id) {
//       Vue.delete(state.me, state.me.id)
//       state.list.splice(state.list.indexOf(state.me.id), 1)
//     }
//     state.me = null
//     localStorage.removeItem('User')
//     router.push(redirect ? redirect : '/')
//   }
// }

// /**
//  * The getters of the User module.
//  * @const {Object}
//  */
// const getters = {
// }

export default {
  state
  // actions,
  // getters,
  // mutations,
  // isAdmin,
}

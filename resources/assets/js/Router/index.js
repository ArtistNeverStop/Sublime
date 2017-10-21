import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from '@/Router/Routes'
import User from '@/Store/Modules/User'
// import store from '@/Store'

// Set the router to the Vue Singleton.
Vue.use(VueRouter)

/**
 * The Vue router Instance.
 * @const {VueRouter}
 */
const router = new VueRouter({
  mode: 'history',
  base: __dirname,
  linkActiveClass: 'active',
  routes
})

/**
 * Check in the metadata if the current
 * route needs auth and handle it.
 * ----------------------------------------
 * @function
 */
router.beforeEach((to, from, next) => {
  // store.commit('status', 200)
  let is = n => r => r.meta[n]
  let route = [].some.bind(to.matched)
  next(User.state.me
    ? route(is('guest')) || (route(is('admin')) && !User.isAdmin())
      ? '/'
      : true
    : route(is('auth'))
      ? '/login'
      : true
  )
})

export default router

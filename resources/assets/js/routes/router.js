import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'
// import axios from 'axios'

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

export default router

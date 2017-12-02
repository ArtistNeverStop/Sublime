import Vue from 'vue'
import axios from '@/Http'

/**
 * Set the Helpers on Vue instances Adding Instance Properties.
 */
Vue.$http = axios

/**
 * Return true if the current route
 * is an admin route.
 * ------------------------------
 * @member {Function}
 * @return {boolean}
 */
Vue.prototype.$adminRoute = function () {
  return this.$route.name && this.$route.name.includes('admin')
}

/**
 * Go to a nnamed route.
 * ------------------------------
 * @member {Function}
 * @return {boolean}
 */
Vue.prototype.$go = function (name) {
  return this.$router.push({name})
}

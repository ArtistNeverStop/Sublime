/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
import axios from 'axios'

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */
let token = document.head.querySelector('meta[name="csrf-token"]')
if (token) {
  axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

/**
 * Set the basic API config to
 * axios.
 * ------------------------------
 * @function api
 */
axios.api = function api () {
  axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
  axios.defaults.headers.common['Accept'] = 'application/json'// Content-Type: application/json
  axios.defaults.baseURL = '/api/'
}

/**
 * Set the basic WEB config to
 * axios and excecute the given
 * callback and return to API
 * basic config.
 * ------------------------------
 * @function api
 * @param {Function} callback - The acttions to excecuted with the axios WEB config
 */
axios.web = function web (callback) {
  axios.defaults.headers.common['Accept'] = 'text/html,application/xhtml+xml,application/xmlq=0.9,image/webp,*/*q=0.8'
  axios.defaults.baseURL = '/'
  callback()
  axios.api()
}
// Set the default axios configuration on API
axios.api()

export default axios

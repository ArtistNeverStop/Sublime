/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import * as VueGoogleMaps from 'vue2-google-maps'
import '@/Http'
import '@/Components/Prototype'
// import '@/Components/Directives'
import '@/Components/Globals'
import router from '@/Router'
import App from '@/Components/Sections/App'
import store from '@/Store'
// import { mapState, mapMutations } from 'vuex'
// import App from '@/sections/App.vue'
import Vue from 'vue'

Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyAb-pcxVpILOwGT7ypK7s0tbGw6cBq8oUQ',
    libraries: 'places' // This is required if you use the Autocomplete plugin
    // OR: libraries: 'places,drawing'
    // OR: libraries: 'places,drawing,visualization'
    // (as you require)
  }
})

store.dispatch('me')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
new Vue({

  /**
   * The Vuex Instance.
   * ------------------------------
   * @member router
   */
  store,

  /**
   * The VueRouter Instance.
   * ------------------------------
   * @member router
   */
  router,

  /**
   * The Dom element where the
   * root instance wil be render.
   * ------------------------------
   * @member el
   */
  el: '#app',

  /**
   * The render function
   * of the Vue App.
   * ------------------------------
   * @function
   * @param h {createElement}
   * @return {createElement}
   */
  render: h => h(App),

  /**
   * The beforeCreate hook life-cycle of
   * the component instance.
   * ------------------------------
   * @member {Function}
   */
  beforeCreate () {
    // this.$store.dispatch('me')
  }
})

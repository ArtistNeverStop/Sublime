/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import '@/Http'
import '@/Components/Prototype'
// import '@/Components/Directives'
import '@/Components/Globals'
import router from '@/Router'
import App from '@/Components/Sections/App'
// import store from '@/Store'
// import { mapState, mapMutations } from 'vuex'
// import App from '@/sections/App.vue'
import Vue from 'vue'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
new Vue({

  /**
   * The VueRouter Instance.
   * ------------------------------
   * @var router
   */
  router,

  /**
   * The Dom element where the
   * root instance wil be render.
   * ------------------------------
   * @var el
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
  render: h => h(App)
})

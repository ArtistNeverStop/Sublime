// import User from './store/User'
// import Watcher from './store/Watcher'
// import router from './routes/router'

// var user = new User({
//   id: 1,
//   name: 'Diego'
// })

// var user2 = new User({
//   id: 1,
//   name: 'Liz'
// })

// user.save()
// user.name = 'FOO'
// user.destroy()
// user2.destroy()
// user.addEventListener('update', () => null)
// user = null
// user2 = null

// console.debug('WATCHER', Watcher)

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import '@/bootstrap'
import '@/components'
import router from '@/routes/router'
import App from '@/components/Sections/App'
import Vue from 'vue'

window.Vue = Vue

new Vue({
  el: '#app',
  render: h => h(App),
  router
})

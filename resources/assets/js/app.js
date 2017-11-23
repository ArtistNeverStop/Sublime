import User from './store/User'
import Watcher from './store/Watcher'

// var user = new User({ id: 1, name: 'Diego' })
// var user2 = new User({ id: 1, name: 'Liz' })

// user.save()
// user2.save()
// console.debug('WATCHER', Watcher)
// var [foo, bar, weakMap, _weakMap] = [{}, (new Array(10000000)).join('*').split('*'), new WeakMap(), new WeakMap()]

// window.foo = foo
// window.bar = bar
// weakMap.set(bar, true)
// _weakMap.set(bar, true)
// weakMap.set(foo, _weakMap)

// console.log(weakMap)

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/example.vue'));

const app = new Vue({
    el: '#app'
});

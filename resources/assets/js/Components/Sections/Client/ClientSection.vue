<template lang="pug">
.app-client.wihte(light='')
  v-navbar(:navbar-show=`navbarShow`)
  router-view(@hiddeNavbar=`navbarShow = false`, @showNavbar=`navbarShow = true`)
  //- .toasts
  //-   toast(v-for=`toast in $root.toasts`, :data=`toast`)
</template>

<script>
import { mapState } from 'vuex'

export default {

  /**
   * The main instance reactive
   * properties of the component.
   * ------------------------------
   * @member {Function}
   * @return {Object}
   */
  data: function () {
    return {
      navbarShow: true
    }
  },

  /**
   * The main instance methods of
   * the component.
   * ------------------------------
   * @member {Object} methods
   */
  methods: {
    //
  },

  /**
   * The main watcher of
   * the component instance.
   * ------------------------------
   * @member {Object} watcher
   */
  watch: {
    //
  },

  /**
   * The main instance computed
   * properties of the component.
   * ------------------------------
   * @member {Object} computed
   */
  computed: {
    ...mapState([
      'User'
    ])
  },

  /**
   * The mounted hook life-cycle of
   * the component instance.
   * ------------------------------
   * @member {Function}
   */
  mounted () {
    console.log(`${this.$options.__file.split('/').slice(-1).pop()} Component Mounted!`)
  }
}
</script>

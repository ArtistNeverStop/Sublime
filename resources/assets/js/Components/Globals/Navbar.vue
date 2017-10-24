<template lang="pug">
  nav.container-fluid.navbar
    .row.end-xs
      .col-md-6
        ul.navbar-site-menu.flex.end-xs
          li(v-if='!User.me')
            router-link(to='/Login') Login
          li(v-if='!User.me')
            router-link(to='/Register') Register
          li(v-if='User.me')
            router-link(to='/Dashboard') {{ User.me.name }}
          li(v-if='User.me')
            router-link(to='/Logout') Logout
          //- li
          //-   a(href='') Logout
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
    data () {
      return {
      }
    },

    /**
     * The main instance computed
     * properties of the component.
     * ------------------------------
     * @member {Object} methods
     * @return {Object}
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
<template lang="pug">
  nav#navbar.container-fluid.navbar
    .row.end-xs
      .col-md-6
        .flex.start-xs
          router-link#sublime-logo.sublime-logo(to='/' tag='h1') S
      .col-md-6
      transition(appear mode='out-in' name='fade')
        ul#navbar-site-menu.navbar-site-menu.flex(v-if='!User.me')
          li
            router-link(to='/Login') Login
          li
            router-link(to='/') Home
          li
            router-link(to='/Artists') Artists
          li
            router-link(to='/Register') Register
      transition(appear mode='out-in' name='fade')
        ul#navbar-site-menu.navbar-site-menu.flex.end-xs(v-if='User.me && User.me.is_user')
          li
            router-link(to='/') Home
          li
            router-link(to='/Dashboard') {{ User.me.name.substring(0, 6) }}
          li
            router-link(to='/Logout') Logout
          li
            router-link(to='/Manage-artists') Manage Artists
          li
            router-link(to='/Become-an-artist') Become an Artist
      transition(appear mode='out-in' name='fade')
        ul#navbar-site-menu.navbar-site-menu.flex.end-xs(v-if='User.me && !User.me.is_user')
          li
            router-link(to='/Logout') Logout
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
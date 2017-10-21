<template lang="pug">
  nav.container-fluid.navbar
    .row
      .col-md-12
        h2 nav site
        ul.navbar-site-menu
          li
            a(href='') Login
</template>

<script>
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
    }
  }
</script>

<style>
  .navbar {
    /*position: static;*/
    z-index: 999999;
  }
</style>
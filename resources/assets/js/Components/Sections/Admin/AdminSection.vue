<template lang="pug">
  .container-fluid.admin-section.flex
    .row
      aside.col-md-4.col-lg-3
        ul
          li
            router-link(to='/Admin/Dashboard') Users
          li
            router-link(to='/Admin/Artists/Requests') Artist Requests
          li
            router-link(to='/Admin/Places') Our Places
          li
            router-link(to='/Logout') Logout
      router-view.col-md-8.col-lg-9
</template>

<style lang="sass" scoped>
@import "~skeleton-css/css/skeleton";
// @import "~font-awesome/css/font-awesome";
aside
  padding-top: 60px;
</style>

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

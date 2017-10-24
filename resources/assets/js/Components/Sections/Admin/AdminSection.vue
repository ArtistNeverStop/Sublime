<template lang="pug">
  .container-fluid.admin-section.flex
    .row
      aside.col-md-4
        ul
          li
            router-link(to='/Admin/Dashboard') Users
          li
            router-link(to='/Admin/Artists/Requests') Artist Requests
          li
            router-link(to='/Admin/Places') Our Places
      router-view.col-md-8
</template>

<style type="text/css">
  aside {
    padding-top: 60px;
  }
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

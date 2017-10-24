<template lang="pug">
  .container-fluid.admin-section.flex
    .row
      aside.col-md-4
        ul
          li
            router-link(to='/Admin/Dashboard') Users
          li
            router-link(to='/Admin/Artists/Requests') Artist Requests
      router-view.col-md-8
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

<template lang="pug">
  .container(v-if='User.me')
    h1 Artist Requests
    table.table
      tr
        th id
        th User Name
        th User Email
        th Artist Name
        th Status
        th 
      tr(v-for='request in Request.all')
        td {{ request.id }}
        td {{ request.user.name }}
        td {{ request.user.email }}
        td {{ request.artist.name }}
        td {{ request.status_string }}
        td
          span
            i.fa.fa-check.fa-fw(@click='updateRequest({id: request.id, status: 1})' aria-hidden="true")
          span
            i.fa.fa-commenting.fa-fw(@click='updateRequest({id: request.id, status: 0})' aria-hidden="true")
          span
            i.fa.fa-trash.fa-fw(@click='updateRequest({id: request.id, status: 2})' aria-hidden="true")
</template>

<style lang="sass" scoped>
  @import "~skeleton-css/css/skeleton";
</style>
<script>
  import { mapState, mapActions } from 'vuex'

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
        'User',
        'Request'
      ])
    },

    /**
     * The main instance methods of
     * the component.
     * ------------------------------
     * @member {Object} methods
     * @return {Object}
     */
    methods: {

      ...mapActions([
        'getRequests',
        'updateRequest',
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
      this.getRequests(['id', 'name', 'email'])
    }
  }
</script>

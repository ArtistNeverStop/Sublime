<template lang="pug">
  .container(v-if='User.me')
    h1 Admin Dashboard
    p {{ User.me.name }}
    table.table
      tr
        th id
        th Name
        th Email
      tr(v-for='user in users')
        td {{ user.id }}
        td {{ user.name }}
        td {{ user.email }}
</template>

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
        users: []
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
     * The main instance methods of
     * the component.
     * ------------------------------
     * @member {Object} methods
     * @return {Object}
     */
    methods: {

      ...mapActions([
        'getUsers'
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
      this.getUsers(['id', 'name', 'email']).then(users => {
        this.users = users.data.users
      })
    }
  }
</script>

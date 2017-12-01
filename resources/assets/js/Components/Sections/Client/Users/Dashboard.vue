<template lang="pug">
  .container(v-if='User.me')
    h1 Dashboard
    p {{ User.me.name }}
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
    }
  }
</script>

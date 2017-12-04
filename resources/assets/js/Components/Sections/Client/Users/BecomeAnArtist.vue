<template lang="pug">
  .container-fluid
    .row.center-xs
      .col-md-12
        h1 Become An Artist
        p Sennd us a request to manage the name, places and prices of an "Artist Account".
        form.container-fluid(@submit.prevent='registerAttempt' role='form')
          .row
            .col-md-12
              label(for='name-input') Artistic Name
              input#name-input(v-model='name' name='name' placeholder='Name' type='text')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.name') {{ error }}
          .row
            .col-md-12
              button.button-primary Send
          .row
            .col-md-12
              p(v-for='request in myRequests')
                strong {{ request.artist.name }}: 
                small {{ request.status_string }}
</template>

<style lang="sass" scoped>
  @import "~skeleton-css/css/skeleton";
</style>
<script>
  
  import { mapState, mapActions, mapGetters } from 'vuex'

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
        name: '',
        errors: {
          errors: {}
        }
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
      ]),

      ...mapGetters([
        'myRequests'
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
        'makeArtistRequest',
        'myArtistRequest'
      ]),

      /**
       * Make the register Attempt.
       * ------------------------------
       * @member {Function} registerAttempt
       */
      registerAttempt () {
        this.makeArtistRequest(this.$data).catch(({ response }) => {
          this.errors = response.data
        })
      }
    },

    /**
     * The mounted hook life-cycle of
     * the component instance.
     * ------------------------------
     * @member {Function}
     */
    mounted () {
      console.log(`${this.$options.__file.split('/').slice(-1).pop()} Component Mounted!`)
      this.myArtistRequest()
    }
  }
</script>

<template lang="pug">
  .container-fluid
    .row
      .col-md-12
        h1 Login
        form.container-fluid(@submit.prevent='loginAttempt' role='form')
          .row
            .col-md-12
              label E-mail
              input(v-model='email' placeholder='email' type='email')
              span(v-if='errors') {{ errors.errors }}
            .col-md-12
              label Password
              input(v-model='password' placeholder='Password' type='password')
          .row
            .col-md-12
              button.button-primary Login
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
        email: '',
        password: '',
        errors: {}
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
        'login'
      ]),

      /**
       * Make tyhe login Attempt.
       * ------------------------------
       * @member {Function} loginAttempt
       */
      loginAttempt () {
        this.login(this.$data)
        .then(user => {
          this.$router.push(user.is_admin ? '/Dashboard' : '/Admin/Dashboard')
        })
        // .catch(({ response }) => {
        //   this.errors = response.data
        // })
      }
    }
  }
</script>

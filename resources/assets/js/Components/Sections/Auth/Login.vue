<template lang="pug">
  .container-fluid
    .row.center-xs.middle-xs.full
      .col-md-6.col-lg-4
        form.container-fluid(@submit.prevent='loginAttempt' role='form')
          h1 Login
          .row
            .col-md-12
              label(for='email-input') Email
              input#email-input(v-model='email' name='email' placeholder='E-mail' type='email')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.email') {{ error }}
            .col-md-12
              label(for='password-input') Password
              input#password-input(v-model='password' name='password' placeholder='Password' type='password')
          .row
            .col-md-12
              button.button-primary Login
</template>

<style type="text/css">
  form {
    transition: all .4s;
    min-height: 500px;
  }
  form:hover {
    -webkit-box-shadow: 0 14px 32px 0 rgba(0,0,0,.3);
    box-shadow: 0 14px 32px 0 rgba(0,0,0,.3);
  }
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
        email: '',
        password: '',
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
          this.$router.push(!user.is_admin ? '/Dashboard' : '/Admin/Dashboard')
        }).catch(({ response }) => {
          this.errors = response.data
        })
      }
    }
  }
</script>

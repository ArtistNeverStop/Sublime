<template lang="pug">
  .container-fluid
    .row.center-xs.middle-xs.full
      .col-md-6.col-lg-4
        form.container-fluid(@submit.prevent='registerAttempt' role='form')
          h1 Register
          .row
            .col-md-12
              label(for='name-input') Name
              input#name-input(v-model='name' name='name' placeholder='Name' type='text')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.name') {{ error }}
            .col-md-12
              label(for='user-name-input') User Name
              input#user-name-input(v-model='user_name' name='user_name' placeholder='User Name' type='text')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.user_name') {{ error }}
            .col-md-12
              label(for='email-input') Email
              input#email-input(v-model='email' name='email' placeholder='E-mail' type='email')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.email') {{ error }}
            .col-md-12
              label(for='password-input') Password
              input#password-input(v-model='password' name='password' placeholder='Password' type='password')
            .col-md-12
              label(for='password-confirmation-input') Password Confirmation
              input#password-confirmation-input(v-model='password_confirmation' name='password_confirmation' placeholder='Password Confirmation' type='password')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.password') {{ error }}
          .row
            .col-md-12
              button.button-primary Register
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
        name: '',
        user_name: '',
        email: '',
        password: '',
        password_confirmation: '',
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
        'register'
      ]),

      /**
       * Make the register Attempt.
       * ------------------------------
       * @member {Function} registerAttempt
       */
      registerAttempt () {
        this.register(this.$data).then(user => {
          this.$router.push(!user.is_admin ? '/Dashboard' : '/Admin/Dashboard')
        }).catch(({ response }) => {
          this.errors = response.data
        })
      }
    }
  }
</script>

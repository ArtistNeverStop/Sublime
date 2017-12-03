<template lang="pug">
  .container-fluid
    .row.center-xs.middle-xs.full
      .col-xs-12
        form.column.center-xs.middle-xs(@submit.prevent='loginAttempt' role='form')
          h1 Login
          v-text-field(label='E-mail', v-model='email', required='')
          v-text-field(label='Password', v-model='password', required='')
          .row
            //- Facebook Oauth2.0
            .oauth2-button-container
              button.btn.facebook(@click.prevent=`OauthLogin('facebook')`)
                i.fa.fa-facebook(aria-hidden='true')
                |                 Facebook
          .row
            //- Gmail Oauth2.0
            .oauth2-button-container
              button.btn.gmail(@click.prevent=`OauthLogin('google')`)
                i.fa.fa-google(aria-hidden='true')
                |               Gmail
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
  import axios from 'axios'

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
        'login',
        'me'
      ]),

      /**
       * Open a new window and try
       * the Oauth2.0
       * ------------------------------
       * @function
       * @param {String} provider
       */
      OauthLogin (provider) {
        axios.web(() => {
          axios.get(`/login/${provider}`).then(({ data }) => {
            const INTERVAL = 100
            const popupWidth = 800
            const popupHeight = 400
            let top = (window.innerWidth / 2) - (popupWidth / 2)
            let left = (window.innerHeight / 2) - (popupHeight / 2)
            // Open the new window
            var win = window.open(
              data, // Url.
              'Authorize', // Name.
              `location=0,status=0,width=${popupWidth},height=${popupHeight},top=${top},left=${left}` // Options.
            )
            // Try to get the user every 100ms.
            var timer = setInterval(() => {
              try {
                // console.debug('TIMER debug', win.location.href)
                if (win.location.href.includes('sublime-user-authorized-done')) {
                  win.close()
                  clearInterval(timer)
                  this.me().then(user => {
                    if (user.is_admin) {
                      this.$router.push({ name: 'admin' })
                    } else {
                      this.$router.push({name:'dashboard'})
                    }
                  })
                }
              } catch (err) {
                console.log(err)
              }
            }, INTERVAL)
          })
        })
      },

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

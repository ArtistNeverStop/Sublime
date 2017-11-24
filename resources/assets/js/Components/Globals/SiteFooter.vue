<template lang="pug">
  .footer-wraper(v-if=`!User.me`, :class=`{
    //- user: User.me.is_user,
    //- admin: User.me.is_admin
  }`)
    .footer.container-fluid
      footer.row
        .col-md-12
</template>

<style>
  .footer-wraper {
    background-color: white;
  }
  .footer-wraper.admin {
    background-color: black; 
  }
  .footer {
    background-image: url('/images/footer-background.png');
    height: 250px;
    /*mix-blend-mode: luminosity;*/
  }
  footer.row {
    background-image: url('/images/confetti.png');
    background-size: cover;
    height: 100%;
  }
</style>

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
        //
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
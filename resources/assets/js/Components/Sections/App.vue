<template lang="pug">
  //- Site Wrapper
  #app.app.site-wrapper
    navbar
    transition(appear mode='out-in' name='fade')
      router-view.site-content
    transition(appear mode='out-in' name='fade')
      site-footer
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
    },

    /**
     * The main instance methods of
     * the component.
     * ------------------------------
     * @member {Object} methods
     * @return {Object}
     */
    methods: {

      /**
       * The main instance reactive
       * properties of the component.
       * ------------------------------
       * @member {Function}
       * @return {Object}
       */
      test () {
        console.debug('Test')
      }
    },

    /**
     * The main instance computed
     * properties of the component.
     * ------------------------------
     * @member {Object} computed
     * @return {Object}
     */
    computed: {
    }
  }
</script>
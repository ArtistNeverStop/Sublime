<template lang="pug">
v-content(:fluid=`true`)
  section#artists-background(v-if=`artist`)
    v-parallax(:src='artist.background_image', height='260')
      v-layout.white--text(column='', align-center='', justify-center='')
        //- img(src='sublime-logo-white.png', alt='SUBLIME', height='200')
        h1.white--text.mb-2.display-1.text-xs-center.shadow-background Artistas
        .subheading.mb-3.text-xs-center
          //- strong.shadow-background {{artist.real_name}}
          strong.shadow-background {{artist.country}}
          //- strong.shadow-background y traelos a tu ciudad!.
        //- v-btn.lighten-2.mt-5(dark='', large='', @click=`$go('artists.index')`)
          | Explorar
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
        'Artist'
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
        'getArtists'
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
      this.getArtists()
    }
  }
</script>

<template lang="pug">
.container-fluid
    .row.center-xs
      .col-md-12
        h1 Artistas a mi nombre
    .row.center-xs
      .col-md-12
        .artist-managable.column(v-for='artist in artists')
          strong {{ artist.name }}
          router-link(:to=`{ name: 'artists.manage.dates', params: { artist: artist.name.split(' ').join('-') }}`) Disponibilidad
          router-link(:to=`{ name: 'artists.manage.info', params: { artist: artist.name.split(' ').join('-') }}`) Información
</template>
<style lang="sass" scoped>
  @import "~skeleton-css/css/skeleton";
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
        artists: []
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
        'myArtists'
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
      this.myArtists().then(artists => (this.artists = artists))
    }
  }
</script>

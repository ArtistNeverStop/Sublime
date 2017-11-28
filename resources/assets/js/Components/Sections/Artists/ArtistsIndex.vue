<template lang="pug">
.container-fluid
  .row.center-xs
    .col-md-12
      h1 Artists
      p(v-for='artist in Artist.all') {{ artist.name }}
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
      'User',
      'Artist',
      'Place'
    ])
  },

  watch: {
    //
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
      'myArtists',
      'getPlaces',
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


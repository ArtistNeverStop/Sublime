<template lang="pug">
v-content(:fluid=`true`)
  section#artists-background
    v-parallax(src='/images/artists-index.jpg', height='600')
      v-layout.white--text(column='', align-center='', justify-center='')
        h1.white--text.mb-2.display-1.text-xs-center.shadow-background Artistas
        .subheading.mb-3.text-xs-center
          //- strong.shadow-background {{artist.real_name}}
          br
          strong.shadow-background Explora nevos Artistas y nuevos Generos
          br
          br
          strong.shadow-background Aqui tienes todo el listado, consulta su disponibilidad y vota por ellos!.
        v-btn.lighten-2.mt-5(dark='', large='', @click=`$go('artists.index')`)
          | Eres Manager ? 
  v-layout(row='',)
    v-flex(xs12='', sm4='', v-for=`artist, in Artist.all`)
      v-card.artist-card
        v-card-media(:src='artist.avatar', height='200px')
        v-card-title(primary-title='')
          div
            .headline {{artist.name}}
            span.grey--text {{artist.real_name}} {{artist.record_label}} 
        v-card-actions
          v-btn(flat='', @click=`$go('artists.detail', {artist: artist.name})`) Vota por el!
          v-btn(flat='', color='purple') Explorar
          v-spacer
          v-btn(icon='', @click.native='')
            v-icon keyboard_arrow_up
        v-slide-y-transition
          v-card-text(v-show='true')
            | {{artist.description }}
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


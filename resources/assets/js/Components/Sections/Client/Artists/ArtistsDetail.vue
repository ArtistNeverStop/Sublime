<template lang="pug">
v-content(:fluid=`true`)
  section#artists-background(v-if=`artist`)
    v-parallax(:src='artist.background_image', height='300')
      v-layout.white--text(column='', align-center='', justify-center='')
        //- img(src='sublime-logo-white.png', alt='SUBLIME', height='200')
        h1.white--text.mb-2.display-1.text-xs-center.shadow-background {{artist.name}}
        .subheading.mb-3.text-xs-center
          strong.shadow-background {{artist.real_name}}
          //- strong.shadow-background y traelos a tu ciudad!.
        //- v-btn.lighten-2.mt-5(dark='', large='', @click=`$go('artists.index')`)
          | Explorar
  v-layout(row='')
    v-flex(xs12='', sm6='', offset-sm1='')
      v-card.artist-card(:class=`{showing: show}`)
        v-card-media(src='/static/doc-images/cards/sunshine.jpg', height='200px')
        v-card-title(primary-title='')
          div
            .headline Top western road trips
            span.grey--text 1,000 miles of wonder
        v-card-actions
          v-btn(flat='') Share
          v-btn(flat='', color='purple') Explore
          v-spacer
          v-btn(icon='', @click.native='show = !show')
            v-icon {{ show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}
        v-slide-y-transition
          v-card-text(v-show='show')
            | I'm a thing. But, like most politicians, he promised more than he could deliver. You won't have time for sleeping, soldier, not with all the bed making you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros to that or we walk! You're going to do his laundry? I've got to find a way to escape.
</template>
<style>
  .artist-card {
    top: -50%;
    transition: 1s all;
  }
  @media only screen and (max-width: 600px)  {
    .artist-card {
      top: 0;
    } 
  }
  .artist-card.showing {
    top: 0;
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
  data: function () {
    return {
      artist: {},
      show: false
    }
  },

  /**
   * The main instance methods of
   * the component.
   * ------------------------------
   * @member {Object} methods
   */
  methods: {
    ...mapActions([
      'fetch'
    ])
  },

  /**
   * The main watcher of
   * the component instance.
   * ------------------------------
   * @member {Object} watcher
   */
  watch: {
    //
  },

  /**
   * The main instance computed
   * properties of the component.
   * ------------------------------
   * @member {Object} computed
   */
  computed: {
    ...mapState([
      'User'
    ])
  },

  /**
   * The mounted hook life-cycle of
   * the component instance.
   * ------------------------------
   * @member {Function}
   */
  async mounted () {
    console.log(`${this.$options.__file.split('/').slice(-1).pop()} Component Mounted!`)
    this.artist = (await this.fetch(['artist', {name: `"${this.$route.params.artist}"`}, []]))
  }
}
</script>

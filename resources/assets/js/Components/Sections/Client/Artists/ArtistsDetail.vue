<template lang="pug">
v-content(:fluid=`true`)
  section#artists-background(v-if=`artist`)
    v-parallax(:src='artist.background_image', height='260')
      v-layout.white--text(column='', align-center='', justify-center='')
        v-flex(xs1='', offset-xs11=``)
          .back.pointer(@click=`$go('artists.index')`)
            v-icon.white--text(x-large='') fast_rewind
            p Artistas
        h1.white--text.mb-2.display-1.text-xs-center.shadow-background {{artist.name}}
        .subheading.mb-3.text-xs-center
          //- strong.shadow-background {{artist.real_name}}
          strong.shadow-background {{artist.country}}
          //- strong.shadow-background y traelos a tu ciudad!.
        //- v-btn.lighten-2.mt-5(dark='', large='', @click=`$go('artists.index')`)
          | Explorar
  v-layout(row='')
    v-flex(xs12='', sm6='', :offset-sm1='!show')
      v-card.artist-card(:class=`{showing: show}`)
        v-card-media(:src='artist.avatar', height='200px')
        v-card-title(primary-title='')
          div
            .headline {{artist.name}}
            span.grey--text {{artist.real_name}} {{artist.record_label}} 
        v-card-actions
          v-btn(flat='') Share
          v-btn(flat='', color='purple') Explore
          v-spacer
          v-btn(icon='', @click.native='show = !show')
            v-icon {{ show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}
        v-slide-y-transition
          v-card-text(v-show='show')
            | {{artist.description }}
    v-flex(xs12='', sm5='')
      p {{artist.description }}
  .soundcloud(v-if='artist.soundcloud_embed', v-html=`artist.soundcloud_embed`)
      //- p {{artist.soundcloud_embed}}
  gmap-map(:center="position", :zoom="7", style="width: 100%; height: 300px", :options="mapOptions")
    gmap-marker(:position='position' :clickable='true' :draggable='true' @position_changed='updatePosition($event)')
</template>
<style scoped>
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
      show: false,
      position: {
        lat: 20.68245716967531,
        lng: -103.38096618652344
      },
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

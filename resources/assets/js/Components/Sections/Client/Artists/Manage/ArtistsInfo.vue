<template lang="pug">
v-content
  v-layout.center-xs
    form.column.col-md-6(@submit.prevent=`save`)
      v-text-field(label='Nombre Artistico', v-model='artist.name', required='')
      v-text-field(label='Nombre Real', v-model='artist.real_name', required='')
      v-text-field(label='Selld Discografico o Compañia a la que Firma', v-model='artist.record_label')
      v-text-field(label='Descripción', v-model='artist.description', required='')
      v-text-field(label='Soundcloud Embed', v-model='artist.soundcloud_embed', required='')
      v-text-field(label='Pais', v-model='artist.country', required='')
      label.btn(for=`avatar`) Avatar
      input#avatar.input-file(type="file", @change="avatar = $event.target.files[0]")
      label.btn(for=`background`) Imagen de fondo
      input#background.input-file(type="file", @change="background = $event.target.files[0]")
      v-btn.primary(@click=`save`) Guardar
      //- v-btn.primary(flat=``) Avatar
      //- v-btn.primary(flat=``) Imagen de fondo 
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
  data: function () {
    return {
      background: null,
      avatar: null,
      artist: {
        name: null,
        real_name: null,
        record_label: null,
        description: null,
        soundcloud_embed: null,
        country: null,
      },
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
    ]),
    save () {
      this.$persistArtists(this.artist, [{file:this.background,type:1}, {file:this.avatar,type:2}])
    }
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

<template lang="pug">
  v-content(v-if='User.me', :fluid=`true`)
    section#expore-artists
      v-parallax(src='images/artic.jpg', height='600')
        v-layout.white--text(column='', align-center='', justify-center='')
          img(src='sublime-logo-white.png', alt='SUBLIME', height='200')
          h1.white--text.mb-2.display-1.text-xs-center.shadow-background Explora Artistas
          .subheading.mb-3.text-xs-center
            strong.shadow-background Consulta la disponibilidad de tus artistas, vota por ellos
            strong.shadow-background y traelos a tu ciudad!.
          v-btn.lighten-2.mt-5(dark='', large='', @click=`$go('artists.index')`)
            | Explorar
    section#work-with-us
      v-parallax(src='images/work-with-us.jpg', height='400')
        v-layout.white--text(column='', align-center='', justify-center='')
          //- img(src='sublime-logo-white.png', alt='SUBLIME', height='200')
          h1.white--text.mb-2.display-1.text-xs-center.shadow-background Trabaja con Nosotros
          .subheading.mb-3.text-xs-center
            v-btn.lighten-2.mt-5.shadow-background Trabaja con nosotros!
            p.shadow-background Incluyete al equipo de SUBLIME como colaborador STAFF.
          v-btn.lighten-2.mt-5(dark='', large='', @click=`$go('register')`)
            | Consultar
    section#join-the-comunity
      v-parallax(src='images/sponsor-us.jpg', height='400')
        v-layout.white--text(column='', align-center='', justify-center='')
          //- img(src='sublime-logo-white.png', alt='SUBLIME', height='200')
          h1.mb-2.display-1.text-xs-center.shadow-background Se un patrocinador!
          .subheading.mb-3.text-xs-center
            v-btn.lighten-2.mt-5.shadow-background Unete como patrocinador de eventos.
            p.shadow-background Comienza a publicar tu perfil de Marca y los productos que provees.
          v-btn.lighten-2.mt-5(dark='', large='', @click=`$go('register')`)
            | Patrocinar
    section#join-the-comunity
      v-parallax(src='images/join-the-comunity.png', height='400')
        v-layout.white--text(column='', align-center='', justify-center='')
          //- img(src='sublime-logo-white.png', alt='SUBLIME', height='200')
          h1.mb-2.display-1.text-xs-center.shadow-background-invert Unete a la comunidad!
          .subheading.mb-3.text-xs-center
            v-btn.lighten-2.mt-5.shadow-background Da de alta tus locales comerciales.
            p.shadow-background Comienza a publicar la renta y disponibilidad de tus locales.
          v-btn.lighten-2.mt-5(dark='', large='', @click=`$go('register')`)
            | Dar de alta
</template>

<script>
import { mapState, mapMutations } from 'vuex'

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
    ]),

  },

  methods: {

    ...mapMutations([
      'logout'
    ]),
    
    deleteAcount () {
      this.$http.delete('me').then(() => {
        this.logout('/')
      })
    }
  }
}
</script>

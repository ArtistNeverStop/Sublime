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
    //- v-layout
      v-flex(xs12='', sm6='')
        v-card
          v-card-media(:src='User.me.avatar', height='200px')
          v-card-title(:primary-title='true')
            div
              h3.headline.mb-0 {{ User.me.name }}
              p Telefono: 33-34-64-69-51
              p Credito: 300$
              p Configura tu Cuenta 
          v-card-actions
            v-btn(color='primary', dark='', @click.stop='dialog = true') Ir a Configuración
    //- v-layout.user-setings(row='', justify-center='')
      v-dialog(v-model='dialog', fullscreen='', transition='dialog-bottom-transition', :overlay='false', scrollable='')
        v-card
          v-toolbar.primary(style='flex: 0 0 auto;', dark='')
            v-btn(icon='', @click.native='dialog = false', dark='')
              v-icon close
            v-toolbar-title Settings
            v-spacer
            v-toolbar-items
              v-btn(dark='', flat='', @click.native='dialog = false') Save
              v-menu(bottom='', right='', offset-y='')
                v-btn(slot='activator', dark='', icon='')
                  v-icon more_vert
                v-list
                  v-list-tile(v-for='item in items', :key='item.title', @click='')
                    v-list-tile-title {{ item.title }}
          v-card-text
            v-btn(color='primary', dark='', @click.stop='dialog2 = !dialog2') Open Dialog 2
            v-tooltip(right='')
              v-btn(slot='activator') Tool Tip Activator
              |             Tool Tip
            v-list(three-line='', subheader='')
              v-subheader User Controls
              v-list-tile(avatar='')
                v-list-tile-content
                  v-list-tile-title Content filtering
                  v-list-tile-sub-title Set the content filtering level to restrict apps that can be downloaded
              v-list-tile(avatar='')
                v-list-tile-content
                  v-list-tile-title Password
                  v-list-tile-sub-title Require password for purchase or use password to restrict purchase
            v-divider
            v-list(three-line='', subheader='')
              v-subheader General
              v-list-tile(avatar='')
                v-list-tile-action
                  v-checkbox(v-model='notifications')
                v-list-tile-content
                  v-list-tile-title Notifications
                  v-list-tile-sub-title Notify me about updates to apps or games that I downloaded
              v-list-tile(avatar='')
                v-list-tile-action
                  v-checkbox(v-model='sound')
                v-list-tile-content
                  v-list-tile-title Sound
                  v-list-tile-sub-title Auto-update apps at any time. Data charges may apply
              v-list-tile(avatar='')
                v-list-tile-action
                  v-checkbox(v-model='widgets')
                v-list-tile-content
                  v-list-tile-title Auto-add widgets
                  v-list-tile-sub-title Automatically add home screen widgets
            v-divider
            v-list(three-line='', subheader='')
              v-subheader Uso de la Cuenta
              v-list-tile(avatar='')
                v-list-tile-content
                  v-list-tile-title Bloquear Cuenta
                  v-list-tile-sub-title Colocar la cuenta en estado de bloqueo
                    v-btn.error bloquear
              v-list-tile(avatar='')
                v-list-tile-content
                  v-list-tile-title Eliminar Cuenta
                  v-list-tile-sub-title Eliminar por completo la cuenta.
                    v-btn.error(@click=`deleteDialog = true`) eliminar
      v-dialog(v-model='dialog2', max-width='500px')
        v-card
          v-card-title
            | Dialog 2
          v-card-text
            v-btn(color='primary', dark='', @click.stop='dialog3 = !dialog3') Open Dialog 3
            v-select(v-bind:items='select', label='A Select List', item-value='text')
          v-card-actions
            v-btn(color='primary', flat='', @click.stop='dialog2=false') Close
      v-dialog(v-model='deleteDialog', max-width='500px')
        v-card
          v-card-title
            v-alert(outline, color="error", icon="warning", :value="true")
              | Se borrara toda la informacion de tu cuenta.
            v-spacer
            v-menu(bottom='', left='')
          v-card-actions
            v-btn(color='error', flat='', @click.stop='deleteAcount') ELIMINAR
            v-btn(color='primary', flat='', @click.stop='deleteDialog = false') cancelar
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
        deleteDialog: false,
        dialog: false,
        dialog2: false,
        notifications: false,
        sound: true,
        widgets: false,
        items: [
          {
            title: 'Click Me'
          },
          {
            title: 'Click Me'
          },
          {
            title: 'Click Me'
          },
          {
            title: 'Click Me 2'
          }
        ],
        select: [
          { text: 'State 1' },
          { text: 'State 2' },
          { text: 'State 3' },
          { text: 'State 4' },
          { text: 'State 5' },
          { text: 'State 6' },
          { text: 'State 7' }
        ]
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

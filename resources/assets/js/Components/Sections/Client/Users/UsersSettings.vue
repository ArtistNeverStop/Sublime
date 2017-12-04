<template lang="pug">
  v-container(v-if='User.me')
    v-layout
      v-flex(xs12='', sm6='')
        v-card
          v-card-media(:src='User.me.avatar', height='200px')
          v-card-title(:primary-title='true')
            div
              h3.headline.mb-0 {{ User.me.name }}
              p Telefono: 33-34-64-69-51
              p Credito: {{ User.me.credit }} $ MXN
              p Configura tu Cuenta 
          v-card-actions
            v-btn(color='primary', dark='', @click.stop='dialog = true') Ir a Configuración
    v-layout.user-setings(row='', justify-center='')
      v-dialog(v-model='dialog', fullscreen='', transition='dialog-bottom-transition', :overlay='false', scrollable='')
        v-card
          v-toolbar.primary(style='flex: 0 0 auto;', dark='')
            v-btn(icon='', @click.native='dialog = false', dark='')
              v-icon close
            v-toolbar-title Configuración
            v-spacer
            v-toolbar-items
              v-btn(dark='', flat='', @click.native='dialog = false') Guardar
              v-menu(bottom='', right='', offset-y='')
                v-btn(slot='activator', dark='', icon='')
                  v-icon more_vert
                v-list
                  v-list-tile(v-for='item in items', :key='item.title', @click='')
                    v-list-tile-title {{ item.title }}
          v-card-text
            v-btn(color='primary', dark='', @click.stop='dialog2 = !dialog2') Abonar credito
            v-tooltip(right='')
              v-btn(slot='activator') Tool Tip Activator
              |             Tool Tip
            v-list(three-line='', subheader='')
              v-subheader Control de cuenta de usuario
              v-list-tile(avatar='')
                v-list-tile-content
                  v-list-tile-title Credito
                  v-list-tile-sub-title {{ User.me.credit }} $ MXN
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
            | Abonar credito
          v-card-text
            //- v-btn(color='primary', dark='', @click.stop='dialog3 = !dialog3') Open Dialog 3
            //- v-select(v-bind:items='select', label='A Select List', item-value='text')
            v-text-field(type=`number`, min=`100`, v-model='recharge', label=`Cantidad a Abonar`)
          v-card-actions
            v-btn(color='primary', flat='', @click.stop='makeRecharge') Abonar
            v-btn(color='primary', flat='', @click.stop='dialog2=false') Cancelar
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
      recharge: 100,
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
    },
    makeRecharge () {
      this.$http.post('recharge', {recharge: this.recharge}).then(({data}) => {
        location = data
        console.log(data)
      })
    }
  }
}
</script>
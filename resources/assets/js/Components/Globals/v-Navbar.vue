<template lang="pug">
v-container(:fluid=`true`, v-show=`navbarShow`)
  v-layout(wrap='')
    v-navigation-drawer(:fixed=`true`, temporary='', v-model='drawer', light='', absolute='', :right=`true`)
      v-list.pa-1
        v-list-tile(avatar='')
          v-list-tile-avatar
            img(:src=`!User.me ? '/sublime-logo.png' : 'https://randomuser.me/api/portraits/men/85.jpg'`)
          v-list-tile-content
            v-list-tile-title.title {{ User.me ? 'John Leider' : 'SUBLIME' }}
      v-list.pt-0(dense='')
        v-divider
        v-list-tile(v-for='item in items', :key='item.title', @click=`$go(item.route)`)
          v-list-tile-action
            v-icon {{ item.icon }}
          v-list-tile-content
            v-list-tile-title {{ item.title }}
    v-toolbar(:fixed=`true`, light='')
      img(@click=`$go('welcome')`, src='/sublime-logo.png', alt='Vuetify.js', height='50')  
      v-toolbar-title {{ title }}
      v-spacer
      //- v-toolbar-side-icon.hidden-md-and-up
      v-toolbar-items
        v-btn(icon, @click='drawer = !drawer') 
          v-icon.dark--text(x-large='') menu 

    //- v-toolbar(:fixed=`true`, light='', v-show=`navbarShow`)
      v-layout(wrap)
        v-flex.middle(xs6)
          img(@click=`$go('welcome')`, src='/sublime-logo.png', alt='Vuetify.js', height='50')
          v-toolbar-title(v-text="title")
        v-flex.middle.end(xs6)
        v-icon.dark--text(x-large='', @click.stop='drawer = !drawer') menu  
</template>

<script>
import { mapState } from 'vuex'

export default {

  props: {
    navbarShow: {
      type: Boolean,
      default: true
    }
  },

  /**
   * The main instance reactive
   * properties of the component.
   * ------------------------------
   * @member {Function}
   * @return {Object}
   */
  data: function () {
    return {
      title: 'SUBLIME',
      drawer: null,
      items: [
        { title: 'Welcome', icon: 'dashboard', route: 'welcome' },
        { title: 'About', icon: 'question_answer', route: 'about' },
        { title: 'Register', icon: 'question_answer', route: 'register' },
        { title: 'Login', icon: 'question_answer', route: 'login' }
      ]
    }
  },

  /**
   * The main instance methods of
   * the component.
   * ------------------------------
   * @member {Object} methods
   */
  methods: {
    //
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
  mounted () {
    console.log(`${this.$options.__file.split('/').slice(-1).pop()} Component Mounted!`)
  }
}
</script>
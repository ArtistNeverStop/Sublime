<template lang="pug">
v-app#app.app-client.wihte(light='')
  v-layout(wrap='')
    v-navigation-drawer(:fixed=`true`, temporary='', v-model='drawer', light='', absolute='', :right=`true`)
      v-list.pa-1
        v-list-tile(avatar='')
          v-list-tile-avatar
            img(src='https://randomuser.me/api/portraits/men/85.jpg')
          v-list-tile-content
            v-list-tile-title John Leider
      v-list.pt-0(dense='')
        v-divider
        v-list-tile(v-for='item in items', :key='item.title', @click='')
          v-list-tile-action
            v-icon {{ item.icon }}
          v-list-tile-content
            v-list-tile-title {{ item.title }}
  v-toolbar(:fixed=`true`, light='')
     v-layout(row wrap)
      v-flex.middle(xs6)
        img(src='sublime-logo.png', alt='Vuetify.js', height='50')
        v-toolbar-title(v-text="title")
      v-flex.middle.end(xs6)
        v-icon.dark--text(x-large='', @click.stop='drawer = !drawer') menu
  router-view
  //- .toasts
  //-   toast(v-for=`toast in $root.toasts`, :data=`toast`)
</template>

<script>
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
      title: 'Sublime',
      drawer: null,
      items: [
        { title: 'Home', icon: 'dashboard' },
        { title: 'About', icon: 'question_answer' }
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
    //
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

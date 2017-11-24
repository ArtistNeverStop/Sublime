<template lang="pug">
  .home-section(ref='home-section')
    section#home-section-video.home-section-video(v-show='showVideo' ref='home-section-video')
      .title-container.col-md-6
        h2 Your favorite artist...
        h2 When you want...
        h2 Where you want...
      .video-text.col-md-6
        video.video(loop muted autoplay)
          //- poster='img/videoframe.jpg'
          //- <source src='/home-video.mp4' type='video/webm'>
          //- <source src='/home-video.mp4' type='video/ogg'>
          source(src='/home-video.mp4' type='video/mp4')
        p.white.no-text-transform Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        p.white.no-text-transform tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        p.white.no-text-transform quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        p.white.no-text-transform consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        p.white.no-text-transform cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        p.white.no-text-transform proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    transition(appear name='fade-down')
      section#home-section-title.home-section-title(v-if='showTitle' ref='home-section-title')
        h1.title(ref='title') Sublime
        div.arrow-down(@click='scrollTo(30)')
    section#home-section-description.home-section-description(ref='home-section-description')
      .row
        .col-md-6
          .column.center-xs
            h2 How does
            h2 it work ?
            p Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            p tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            p quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            p consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            p cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            p proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        .col-md-6
    section.home-section-description(ref='home-section-description')
      .row
        .col-md-6
        .col-md-6
          .column.center-xs
            h2 How many
            h2 Artists ?
            p Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            p tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            p quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            p consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            p cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            p proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    section.black.home-section-description(ref='home-section-description')
      .row
        .col-md-6
          .column.center-xs
            h2 How much
            h2 it cost?
            p Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            p tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            p quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            p consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            p cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            p proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        .col-md-6
    section.home-section-description(ref='home-section-description')
      .row
        .col-md-6
        .col-md-6
          .column.center-xs
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
    data () {
      return {
        showTitle: true,
        showVideo: false
      }
    },

    /**
     * The main instance methods of
     * the component.
     * ------------------------------
     * @member {Object} methods
     * @return {Object}
     */
    methods: {

      /**
       * The main instance reactive
       * properties of the component.
       * ------------------------------
       * @member {Function}
       * @return {Object}
       */
      onscroll () {
        this.showTitle = (window.scrollY <= 0)
        this.showVideo = !this.showTitle
        if (window.scrollY >= 800 && window.scrollY <= 1856) {
          document.getElementById('navbar-site-menu').classList.add('white')
          document.getElementById('sublime-logo').classList.add('white')
        } else {
          document.getElementById('navbar-site-menu').classList.remove('white')
          document.getElementById('sublime-logo').classList.remove('white')
        }
      },

      /**
       * The main instance reactive
       * properties of the component.
       * ------------------------------
       * @member {Function}
       * @return {Object}
       */
      scrollTo (n) {
        window.scrollTo(0, n)
      }
    },

    /**
     * The mounted hook life-cycle of
     * the component instance.
     * ------------------------------
     * @member {Function}
     */
    mounted () {
      console.log(`${this.$options.__file.split('/').slice(-1).pop()} Component Mounted!`)
      // window.setTimeout(() => {
      //   this.$refs['home-section-title'].style.backgroundColor = 'black'
      //   this.$refs.title.style.color = 'white'
      // }, 500)
      // this.$refs['home-section'].onscroll = this.scroll
      window.addEventListener('scroll', this.onscroll)
    }
  }
</script>

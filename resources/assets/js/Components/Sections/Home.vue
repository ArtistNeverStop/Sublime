<template lang="pug">
  .home-section(ref='home-section')
    section#home-section-video.home-section-video(v-show='showVideo' ref='home-section-video')
       video.video(loop muted autoplay)
          //- poster='img/videoframe.jpg'
          //- <source src='/home-video.mp4' type='video/webm'>
          //- <source src='/home-video.mp4' type='video/ogg'>
          source(src='/home-video.mp4' type='video/mp4')
    transition(appear name='fade-down')
      section#home-section-title.home-section-title(v-if='showTitle' ref='home-section-title')
        h1.title(ref='title') Sublime
        div.arrow-down(@click='scrollTo(30)')
    section#home-section-description.home-section-description(ref='home-section-description')
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

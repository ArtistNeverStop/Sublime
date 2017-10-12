<template>
  <div ref="home-section" class="home-section">
    <section v-show="showVideo" ref="home-section-video" class="home-section-video" id="home-section-video">
       <video loop muted autoplay class="video">
        <!-- poster="img/videoframe.jpg" -->
          <!-- <source src="/home-video.mp4" type="video/webm">
          <source src="/home-video.mp4" type="video/ogg"> -->
          <source src="/home-video.mp4" type="video/mp4">
      </video>
    </section>
    <transition appear name="fade-down">
      <section v-if="showTitle" ref="home-section-title" class="home-section-title" id="home-section-title">
        <h1 class="title" ref="title">Sublime</h1>
        <div @click="scrollTo(30)" class="arrow-down"></div>
      </section>
    </transition>
    <section ref="home-section-description" class="home-section-description" id="home-section-description">
      
    </section>
  </div>
</template>

<script>
  export default {

    data () {
      return {
        showTitle: true,
        showVideo: false
      }
    },

    methods: {
      onscroll () {
        this.showTitle = (window.scrollY <= 0)
        this.showVideo = !this.showTitle
      },

      scrollTo (n) {
        window.scrollTo(0, n)
      }
    },

    mounted () {
      console.log('Component mounted.')
      // window.setTimeout(() => {
      //   this.$refs['home-section-title'].style.backgroundColor = 'black'
      //   this.$refs.title.style.color = 'white'
      // }, 500)
      // this.$refs['home-section'].onscroll = this.scroll
      window.addEventListener('scroll', this.onscroll)
    }
  }
</script>

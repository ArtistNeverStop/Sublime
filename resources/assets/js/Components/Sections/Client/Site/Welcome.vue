<template lang="pug">
main
  v-content
    section#home-section-video.home-section.home-section-video(ref='home-section-video')
      transition(appear name='fade-down')
        section#home-section-title.home-section-title(v-if='showTitle' ref='home-section-title')
          h1.title(ref='title') Sublime
          div.arrow-down(@click='scrollTo(30)')
    section
      v-parallax(src='images/party-croud.jpg', height='600')
        v-layout.white--text(column='', align-center='', justify-center='')
          img(src='', alt='Vuetify.js', height='200')
          h1.white--text.mb-2.display-1.text-xs-center SUBLIME
          .subheading.mb-3.text-xs-center Powered by Vuetify
          v-btn.lighten-2.mt-5(dark='', large='', href='/pre-made-themes')
            | Get Started
    section
      v-layout.my-5(column='', wrap='', align-center='')
        v-flex.my-3(xs12='', sm4='')
          .text-xs-center
            h2.headline The best way to start developing
            span.subheading
              | Cras facilisis mi vitae nunc
        v-flex(xs12='')
          v-container(grid-list-xl='')
            v-layout(row='', wrap='', align-center='')
              v-flex(xs12='', md4='')
                v-card.elevation-0.transparent
                  v-card-text.text-xs-center
                    v-icon.dark--text(x-large='') local_bar
                  v-card-title.layout.justify-center(primary-title='')
                    .headline.text-xs-center Material Design
                  v-card-text
                    | Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
                    | Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                    | Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti.
              v-flex(xs12='', md4='')
                v-card.elevation-0.transparent
                  v-card-text.text-xs-center
                    v-icon.dark--text(x-large='') monetization_on
                  v-card-title.layout.justify-center(primary-title='')
                    .headline Fast development
                  v-card-text
                    | Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
                    | Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                    | Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti.
              v-flex(xs12='', md4='')
                v-card.elevation-0.transparent
                  v-card-text.text-xs-center
                    v-icon.dark--text(x-large='') public
                  v-card-title.layout.justify-center(primary-title='')
                    .headline.text-xs-center Completely Open Sourced
                  v-card-text
                    | Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
                    | Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                    | Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti.
    section
      v-parallax(src='images/party-croud2.jpg', height='380')
        v-layout(column='', align-center='', justify-center='')
          .headline.white--text.mb-3.text-xs-center Web development has never been easier
          em Kick-start your application today
          v-btn.lighten-2.mt-5(dark='', large='', href='/pre-made-themes')
            | Get Started
    section
      v-container(grid-list-xl='')
        v-layout.my-5(row='', wrap='', justify-center='', style="position: relative;")
          .cell-phone.children_.a8.l5.l6.l7(data-reactid='146', style="position: absolute; top: -300px; right: 0px; transform: rotate(-10deg);")
            .base_.mg.mh.l8.l9.la.lb.lc.ld.base_.an.m.fl.fm(data-reactid='147', style="position: relative;")
              iframe.content_.c0.a8.le.lf(style='top: 100.0002px; height: 462px; left: 37.9866px; width: 260.906px; position: absolute; background-color:', data-reactid='148', src="/")
                //- div(data-reactid='149')
                //-   div(data-reactid='150')
                //-     .base_.am
                //-       .heroImage_.mi.fl.fk.fm.mj(style='background-image: url("https://duyt4h9nfnj50.cloudfront.net/resized/ba3bcc802f2339488585dae3ba630bed-w240-4a.jpg");')
                //-       .overview_.mk.ml.a7.mm.mn.mo.v
                //-         .lead Taquería El Charro Grill
                //-         .details_.mp.mq.ij.base_.m8.cc.nf.details_.mp.mq.ij
                //-           .list_.md.ni.bt.bu.bv
                //-             .overflow_.nj.if $ • Mexicana
                //-         .eta_.mp.mq.mr.ci.base_ 30 - 40 min
                //-       .menu_.ms.a7.mt.mu
                //-         .sectionTitle_.v.mv.mw.mx.my.mz.n0.n1.n2 Más Populares
                //-         .item_.m8.n3.n4.n5.n6.n7.n8
                //-           .itemContent_.mn.z.a1.a2.a3
                //-             .itemTitle_.n9.mq Especialidad El Charro
                //-             .itemDescription_.na.nb.mq.nc.nd.ne.if
                //-               | 3 sincronizadas acompañadas de carne al gusto, pico de gallo, aguacate y frijoles charros.
                //-             .itemPrice_.nb.mq MXN75.00
                //-         .item_.m8.n3.n4.n5.n6.n7.n8
                //-           .itemContent_.mn.z.a1.a2.a3
                //-             .itemTitle_.n9.mq Burrito Texano Grande de Pastor
                //-             .itemDescription_.na.nb.mq.nc.nd.ne.if
                //-               | Burrito en tortilla de harina grande, preparado con frijoles charros, queso, carne y verdura.
                //-             .itemPrice_.nb.mq MXN75.00
                //-         .item_.m8.n3.n4.n5.n6.n7.n8
                //-           .itemContent_.mn.z.a1.a2.a3
                //-             .itemTitle_.n9.mq Tortas (Estilo México)
                //-             .itemDescription_.na.nb.mq.nc.nd.ne.if
                //-               | Deliciosa Torta  de carnitas preparada con cilantro, cebolla y nuestra exquisita salsa picosita.
                //-             .itemPrice_.nb.mq MXN50.00
                //-         .item_.m8.n3.n4.n5.n6.n7.n8
                //-           .itemContent_.mn.z.a1.a2.a3
                //-             .itemTitle_.n9.mq Taco de Carnitas
                //-             .itemDescription_.na.nb.mq.nc.nd.ne.if Taco de carnitas acompañado de cilantro y cebolla
                //-             .itemPrice_.nb.mq MXN16.00
              img.shell_.a8.c.f(src='https://d3i4yxtzktqr9n.cloudfront.net/web-eats/static/images/components/iphone-preview/phone-shell-2d1c99172b.png', width='340', height='654', data-reactid='152')
              img.shadow_.lg(src='https://d3i4yxtzktqr9n.cloudfront.net/web-eats/static/images/components/iphone-preview/phone-shadow-67119ef839.png', width='340', height='654', data-reactid='153', style="left: 0px; position: absolute;")
          v-flex(xs12='', sm4='')
            v-card.elevation-0.transparent
              v-card-title.layout.justify-center(primary-title='')
                .headline Company info
              v-card-text
                | Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
                | Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                | Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti.
          v-flex(xs12='', sm4='', offset-sm1='')
            v-card.elevation-0.transparent
              v-card-title.layout.justify-center(primary-title='')
                .headline Contact us
              v-card-text
                | Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
              v-list.transparent
                v-list-tile
                  v-list-tile-action
                    v-icon.blue--text.text--lighten-2 phone
                  v-list-tile-content
                    v-list-tile-title 777-867-5309
                v-list-tile
                  v-list-tile-action
                    v-icon.blue--text.text--lighten-2 place
                  v-list-tile-content
                    v-list-tile-title Chicago, US
                v-list-tile
                  v-list-tile-action
                    v-icon.blue--text.text--lighten-2 email
                  v-list-tile-content
                    v-list-tile-title john@vuetifyjs.com
    v-footer.blue.darken-2
      v-layout(row='', wrap='', align-center='')
        v-flex(xs12='')
          .white--text.ml-3
            | Made with
            v-icon.red--text favorite
            |                 by 
            a.white--text(href='https://vuetifyjs.com', target='_blank') Vuetify
            |                 and 
            a.white--text(href='https://github.com/vwxyzjn') Costa Huang
  //- //- Site Wrapper
  //- #app.app.site-wrapper
  //-   navbar
  //-   transition(appear mode='out-in' name='fade')
  //-     router-view.site-content
  //-   transition(appear mode='out-in' name='fade')
  //-     site-footer
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
      title: 'SUBLIME',
      showTitle: true,
      showVideo: false
    }
  },

  /**
   * The main instance computed
   * properties of the component.
   * ------------------------------
   * @member {Object} computed
   * @return {Object}
   */
  computed: {
    //
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
      // if (window.scrollY >= 800 && window.scrollY <= 1856) {
      //   document.getElementById('navbar-site-menu').classList.add('white')
      //   document.getElementById('sublime-logo').classList.add('white')
      // } else {
      //   document.getElementById('navbar-site-menu').classList.remove('white')
      //   document.getElementById('sublime-logo').classList.remove('white')
      // }
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
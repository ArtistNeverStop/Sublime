<template lang="pug">
v-content
  .sublime.hidden-md-and-down
    transition(appear, mode="out-in", name='fade-down')
      canvas#canvas(v-show='showTitle')
    section#home-section-video.home-section.home-section-video(ref='home-section-video')
      transition(appear name='fade-down',  mode="out-in")
        section#home-section-title.home-section-title(v-show='showTitle' ref='home-section-title')
          h1(ref='title') Sublime
          div.arrow-down(@click='scrollTo(5)')
  transition(appear, mode="out-in", name='fade')
    .welcome-content
      section
        v-parallax(src='images/party-croud.jpg', height='600')
          v-layout.white--text(column='', align-center='', justify-center='')
            img(src='', alt='Vuetify.js', height='200')
            h1.white--text.mb-2.display-1.text-xs-center SUBLIME
            .subheading.mb-3.text-xs-center La web definitiva de Crowfunding para eventos.
            v-btn.lighten-2.mt-5(dark='', large='', href='/pre-made-themes')
              | Crear una cuenta
      section
        v-layout.my-5(column='', wrap='', align-center='')
          v-flex.my-3(xs12='', sm4='')
            .text-xs-center
              h2.headline La mejor manera de disfrutar eventos.
              span.subheading
                | Tu decides cuando y donde, nosotros lo hacemos posible.
          v-flex(xs12='')
            v-container(grid-list-xl='')
              v-layout(row='', wrap='', align-center='')
                v-flex(xs12='', md4='')
                  v-card.elevation-0.transparent
                    v-card-text.text-xs-center
                      v-icon.dark--text(x-large='') local_bar
                    v-card-title.layout.justify-center(primary-title='')
                      .headline.text-xs-center Consumo mas facil
                    v-card-text
                      | Las compras dentro de Sublime no pueden ser mas faciles, solo selecciones el producto y aceptas.
                      | El manejo de stock productos de consumo es por evento con los patrocinadores que tu eligas.
                      | Los distintos patrocinadores administras sus propios productos por cada evento.
                v-flex(xs12='', md4='')
                  v-card.elevation-0.transparent
                    v-card-text.text-xs-center
                      v-icon.dark--text(x-large='') monetization_on
                    v-card-title.layout.justify-center(primary-title='')
                      .headline No necesitas efectivo.
                    v-card-text
                      | No necesitas llevar dinero el dia del evento, solo tu y tu celular, o solo tu codigo de boleto. 
                      | Dentro del evento podras realizar compras con tu credito de la aplicacion.
                      | Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti.
                v-flex(xs12='', md4='')
                  v-card.elevation-0.transparent
                    v-card-text.text-xs-center
                      v-icon.dark--text(x-large='') public
                    v-card-title.layout.justify-center(primary-title='')
                      .headline.text-xs-center API publica.
                    v-card-text
                      | SUBLIME tiene la mejor conectividad para aplicaciones terceras.
                      | Tu tienes control de tus datos e informacion.
                      | GraphQL y su documentacion abierta para desarrolladores.
      section
        v-parallax(src='images/party-croud2.jpg', height='380')
          v-layout(column='', align-center='', justify-center='')
            .headline.white--text.mb-3.text-xs-center Manejar eventos nunca habia sido tan facil.
            em Inicia tu cuanta ahora!.
            v-btn.lighten-2.mt-5(dark='', large='', href='/pre-made-themes')
              | Crear una cuenta
      section
        v-container(grid-list-xl='')
          v-layout.my-5(row='', wrap='', justify-center='', style="position: relative;")
            .cell-phone.hidden-md-and-down.children_.a8.l5.l6.l7(data-reactid='146', style="position: absolute; top: -300px; right: 0px; transform: rotate(-10deg);")
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
                      v-list-tile-title diego@wearesublime.com
      v-footer.blue.darken-2
        v-layout(row='', wrap='', align-center='')
          v-flex(xs12='')
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

  watch: {
    showTitle (showTitle) {
      if (showTitle) {
        this.$emit('hiddeNavbar')
      } else {
        this.$emit('showNavbar')
      }
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
      if (this.showTitle || window.scrollY === 0)
        this.showTitle = window.scrollY <= 1
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
    this.$emit('hiddeNavbar')
    // window.setTimeout(() => {
    //   this.$refs['home-section-title'].style.backgroundColor = 'black'
    //   this.$refs.title.style.color = 'white'
    // }, 500)
    // this.$refs['home-section'].onscroll = this.scroll
    window.addEventListener('scroll', this.onscroll)

    function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

    var SPEED = 10;

    // canvas setup
    var canvas = document.getElementById('canvas');
    var dpr = window.devicePixelRatio || 1;
    var ctx = canvas.getContext('2d');

    canvas.width = window.innerWidth * dpr;
    canvas.height = window.innerHeight * dpr;
    canvas.style.width = window.innerWidth + 'px';
    canvas.style.height = window.innerHeight + 'px';

    window.addEventListener('resize', function () {
        canvas.width = window.innerWidth * dpr;
        canvas.height = window.innerHeight * dpr;
        canvas.style.width = window.innerWidth + 'px';
        canvas.style.height = window.innerHeight + 'px';
    });

    var mousePos = {
        x: canvas.width / 2,
        y: canvas.height / 2
    };


    window.addEventListener('mousemove', function (e) {
        mousePos = {
            x: e.clientX * dpr,
            y: e.clientY * dpr
        };
    });

    var WARP = undefined;
    window.addEventListener('mousedown', function () {
        WARP = 4;
    });

    window.addEventListener('mouseup', function () {
        WARP = false;
    });

    window.addEventListener("touchstart",  function () {
        WARP = 4;
    }, false);
    window.addEventListener("touchend",  function () {
        WARP = false;
    }, false);
    window.addEventListener("touchcancel",  function () {
        WARP = false;
    }, false);
    window.addEventListener("touchmove",  function (e) {
        mousePos = {
            x: e.touches[0].clientX * dpr,
            y: e.touches[0].clientY * dpr
        };
    }, false);
    var Confetti = function () {
        function Confetti(x, y, ctx) {
            _classCallCheck(this, Confetti);

            var dpr = window.devicePixelRatio || 1;
            this.x = x * dpr;
            this.y = y * dpr;

            this.vx = scaleBetween(x, WARP ? -WARP * dpr : -SPEED * dpr, WARP ? WARP * dpr : SPEED * dpr, 0, canvas.width / 2);
            this.vy = scaleBetween(y, WARP ? -WARP * dpr : -SPEED * dpr, WARP ? WARP * dpr : SPEED * dpr, 0, canvas.height / 2);

            this.ctx = ctx;

            // confetti parameters
            this.r = 0.1;
            this.d = 10 * dpr;
            this.ratio = this.r < this.d ? this.r / this.d : this.d / this.r;

            this.colors = ['#b8b74d', '#5658fc', '#56c8fc', '#eecee6', '#a8d99c', '#f0261d', '#92a0fd', '#f8c265', '#df642f', '#d5a446'];
            this.color = this.colors[Math.floor(this.colors.length * Math.random())];

            this.angle = 4 * dpr;
            this.tilt = Math.random();
            this.tiltAngle = Math.random();
            this.tiltAngleIncremental = 0.05 * Math.random();
        }

        Confetti.prototype.drawConfetti = function drawConfetti() {
            this.ctx.beginPath();
            this.ctx.lineWidth = this.d / 2;
            this.ctx.strokeStyle = this.color;
            this.ctx.moveTo(this.x + this.tilt + this.r, this.y);
            this.ctx.lineTo(this.x + this.tilt, this.y + this.tilt + this.r);
            this.ctx.stroke();

            this.updateConfettiParticle();
        };

        Confetti.prototype.updateConfettiParticle = function updateConfettiParticle() {
            this.vx = scaleBetween(this.x, WARP ? -WARP * dpr : -SPEED * dpr, WARP ? WARP * dpr : SPEED * dpr, mousePos.x - canvas.width, mousePos.x + canvas.width);
            this.vy = scaleBetween(this.y, WARP ? -WARP * dpr : -SPEED * dpr, WARP ? WARP * dpr : SPEED * dpr, mousePos.y - canvas.height, mousePos.y + canvas.width);

            var tiltAngle = 0.01 * this.d;
            this.r = this.r > 20 ? this.r : this.r + 0.1; // max 10

            this.angle += 0.1;
            this.tiltAngle += tiltAngle;
            this.tiltAngle += this.tiltAngleIncremental;
            this.tilt = Math.sin(this.tiltAngle - this.r / 2) * this.r * 2;
            this.y += Math.sin(this.angle + this.r / 2) * 2;
            this.x += Math.sin(this.angle) / 2;
            this.x += this.vx;
            this.y += this.vy;
        };

        return Confetti;
    }();

    var confettis = [];

    for (var i = 0; i < 200; i++) {
        addConfettiParticle();
    }

    function addConfettiParticle() {
        var x = window.innerWidth * Math.random();
        var y = window.innerHeight * Math.random();
        var c = new Confetti(x, y, ctx);
        confettis.push(c);
    }

    function draw() {
        var offset = 100;
        ctx.globalCompositeOperation = WARP ? 'lighten' : 'source-over';
        try {

          var gradient = ctx.createRadialGradient(mousePos.x, mousePos.y , canvas.width / 2, mousePos.x, mousePos.y, 0);
        } catch (error) {
          console.log(mousePos.x, mousePos.y , canvas.width / 2, mousePos.x, mousePos.y, 0)
        }

        if (WARP) {
          gradient.addColorStop(0.5, '#ffffff');
        } else {
        }
        gradient.addColorStop(1, '#ffffff');
        gradient.addColorStop(0.98, '#cf85d3');
        gradient.addColorStop(0.90, '#7b427f');
        gradient.addColorStop(0.75, '#321234');
        // gradient.addColorStop(0.25, '#321234');
        gradient.addColorStop(.20, '#010121');
        ctx.fillStyle = gradient;
        // ctx.fillStyle = "#ffffff";

        WARP ? null : ctx.fillRect(0, 0, canvas.width, canvas.height);

        confettis.forEach(function (confetti, i) {
            confetti.drawConfetti();
            if (confetti.x < -offset || confetti.y < -offset || confetti.x > canvas.width + offset || confetti.y > canvas.height + offset) {
                confetti.dead = true;
            }
        });

        confettis.forEach(function (confetti, i) {
            if (confetti.dead) {
                confettis.splice(i, 1);
                addConfettiParticle();
            }
        });

        window.requestAnimationFrame(draw);
    }

    function scaleBetween(unscaledNum, minAllowed, maxAllowed, min, max) {
        return (maxAllowed - minAllowed) * (unscaledNum - min) / (max - min) + minAllowed;
    }

    draw();
  }
}
</script>
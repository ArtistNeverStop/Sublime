<template lang="pug">
  .container-fluid
    .row.center-xs
      .col-md-12
        h1 My Managed Artists
        router-link(:to=`{name: 'artists.manage.map'}`) MAP
    .row.center-xs
      .col-md-12
        .container-fluid(v-for='artist in Artist.all')
          .row
            .col-md-12
              h2 {{ artist.name }}
          .row
            .col-md-12
              label(for='date') Date
              input.date-range(name=`date`, v-model=`fakeDate`)
            .col-md-12
              label(for='price') Price per Person
              input#price-input(v-model='price_per_person' name='price_per_person' placeholder='Price' type='number')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.price') {{ error }}
            .col-md-12
              label(for='place') Place
              select#place-input(v-model='place' name='place' placeholder='Place' type='text')
                option(disabled selected) Select a Place
                option(v-for='place in Place.all' :value='place.id') {{ place.name }}
              div(v-if='place')
                //- pre {{ Place.all[place] }}
                p Location: {{ Place.all[place].address }}
                p People limit: {{ Place.all[place].people_limit }}
                p Name: {{ Place.all[place].name }}
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.place') {{ error }}
            .col-md-12
              label(for='min_quantity_persons') Min Quantity Persons
              input#min-quantity-persons-input(min=`0`, max=`place.people_limit`, v-if='place', v-model='min_quantity_persons' name='min_quantity_persons' placeholder='Min Quantity Persons' type='number')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.min_quantity_persons') {{ error }}
            .col-md-12
              label(for='extra_specifications') Extra Specifications
              textarea#extra-specifications-input(v-model='extra_specifications' name='extra_specifications' placeholder='Extra Specifications' type='text')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.extra_specifications') {{ error }}
            .col-md-12
              button.button-primary(@click=`saveDate`) Save
        .row(v-if=`Artist.all[1]`)
          .col-md-4(v-for=`place in Artist.all[1].places_available`)
            .places-available
              p
                strong Place:
                span {{ place.address }}
              p
                strong Since:
                span {{ place.pivot.start_at }}
              p
                strong Until:
                span {{ place.pivot.finish_at }}
</template>

<script>
  
  import { mapState, mapActions } from 'vuex'
  import axios from 'axios'

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
        start_at: null,
        finish_at: null,
        fakeDate: null,
        date: null,
        price_per_person: null,
        place: null,
        min_quantity_persons: null,
        extra_specifications: null,
        datePlaces: [],
        errors: {
          errors: {

          }
        }
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
        'User',
        'Artist',
        'Place'
      ])
    },

    watch: {
      min_quantity_persons (min_quantity_persons) {
        if (parseInt(min_quantity_persons) > this.Place.all[this.place].people_limit) {
          this.errors.errors.min_quantity_persons = ['The min quantity persons could not be gratter than the Place people limit ']
          this.min_quantity_persons = 0
        } else {
          this.errors.errors.min_quantity_persons = []
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

      ...mapActions([
        'myArtists',
        'getPlaces'
      ]),

      saveDate () {
        axios.post(`/me/artists/${this.$route.params.artist}/places/${this.place}`, this.$data).then(({ data }) => {
          this.datePlaces = data
        })
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
      window.flatpickr(".date-range", {
        mode: "range",
        minDate: "today",
        altInput: true,
        dateFormat: "YYYY-MM-DD",
        onChange: (selectedDates, dateStr, instance) => {
          this.date = selectedDates
          this.start_at = selectedDates[0]
          this.finish_at = selectedDates[1]
          console.log(selectedDates, dateStr, instance)
        }
      });
      this.myArtists()
      this.getPlaces()
    }
  }
</script>


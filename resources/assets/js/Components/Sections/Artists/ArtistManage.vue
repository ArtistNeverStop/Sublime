<template lang="pug">
  .container-fluid
    .row.center-xs
      .col-md-12
        h1 My Managed Artists
    .row.center-xs
      .col-md-12
        .container-fluid(v-for='artist in Artist.all')
          .row
            .col-md-12
              h2 {{ artist.name }}
          .row
            .col-md-12
              label(for='price') Price
              input#price-input(v-model='price' name='price' placeholder='Price' type='text')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.price') {{ error }}
            .col-md-12
              label(for='place') Place
              select#place-input(v-model='place' name='place' placeholder='Place' type='text')
                option(disabled selected) Select a Place
                option(v-for='place in Place.all' :value='place.id') {{ place.name }}
              div(v-if='place')
                pre {{ Place.all[place] }}
                //- p
                //-   strong Address:
                //-   {{ Place.all[place].address }}
                //- p
                //-   strong People Limit:
                //-   {{ Place.all[place].people_limit }}
                //- {{ Place.all[place] }}
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.place') {{ error }}
            .col-md-12
              label(for='min_quantity_persons') Min Quantity Persons
              input#min-quantity-persons-input(v-model='min_quantity_persons' name='min_quantity_persons' placeholder=' Min Quantity Persons' type='number')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.min_quantity_persons') {{ error }}
            .col-md-12
              label(for='extra_specifications') Extra Specifications
              textarea#extra-specifications-input(v-model='extra_specifications' name='extra_specifications' placeholder='Extra Specifications' type='text')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.extra_specifications') {{ error }}
</template>

<script>
  
  import { mapState, mapActions } from 'vuex'

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
        price: '',
        place: null,
        min_quantity_persons: '',
        extra_specifications: '',
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
      this.myArtists()
      this.getPlaces()
    }
  }
</script>

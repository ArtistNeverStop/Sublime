<template lang="pug">
  .container(v-if='User.me')
    h1 Our Places
    router-link.button-primary(to='/Admin/Places/New' tag='button') New
    table.table
      tr
        th id
        th Address
        th People limit
        th Area 
          small m2
        th Floors
        th 
      tr(v-for='Place in Place.all')
        td {{ Place.id }}
        td {{ Place.address }}
        td {{ Place.people_limit }}
        td {{ Place.floors }}
        td {{ Place.area }}
        td
          span
            i.fa.fa-check.fa-fw(@click='updatePlace({id: Place.id, status: 1})' aria-hidden="true")
          span
            i.fa.fa-commenting.fa-fw(@click='updatePlace({id: Place.id, status: 0})' aria-hidden="true")
          span
            i.fa.fa-trash.fa-fw(@click='deletePlace(Place.id)' aria-hidden="true")
</template>

<style lang="sass" scoped>
  @import "~skeleton-css/css/skeleton";
</style>
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
        'getPlaces',
        'updatePlace',
        'deletePlace'
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
      this.getPlaces(['id', 'name', 'email'])
    }
  }
</script>

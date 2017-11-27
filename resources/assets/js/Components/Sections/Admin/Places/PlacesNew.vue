<template lang="pug">
  .container-fluid
    .row.center-xs
      .col-md-12
        form.container-fluid(@submit.prevent='store' role='form')
          h1 New Place
          .row
            .col-md-12
              label(for='name-input') Name
              input#name-input(v-model='name' name='name' placeholder='Name' type='text')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.address') {{ error }}
            .col-md-12
              label(for='address-input') Address
              input#address-input(v-model='address' name='address' placeholder='Address' type='text')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.address') {{ error }}
            .col-md-12
              label(for='people-limit-input') People Limit
              input#people-limit-input(v-model='people_limit' name='people_limit' placeholder='People Limit' type='number')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.people_limit') {{ error }}
            .col-md-12
              label(for='area-input') Area 
                small m2
              input#area-input(v-model='area' name='area' placeholder='Area' type='number')
              span.center-xs.error-message(v-if='errors.errors' v-for='error in errors.errors.area') {{ error }}
            .col-md-12
              label(for='floors-input') Floors
              input#floors-input(v-model='floors' name='floors' placeholder='Floors' type='number')
            .col-md-12
              .flex.center-xs
                //- p {{ position }}
                gmap-map(:center="position", :zoom="7", style="width: 500px; height: 300px", :options="mapOptions")
                  gmap-marker(:position='position' :clickable='true' :draggable='true' @position_changed='updatePosition($event)')
          .row
            .col-md-12
              button.button-primary Register
</template>

<style type="text/css">
  form {
    transition: all .4s;
    min-height: 500px;
  }
  form:hover {
    -webkit-box-shadow: 0 14px 32px 0 rgba(0,0,0,.3);
    box-shadow: 0 14px 32px 0 rgba(0,0,0,.3);
  }
</style>

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
        name: '',
        address: '',
        people_limit: '',
        area: '',
        floors: '',
        errors: {
          errors: {}
        },
        position: {
          lat: 20.68245716967531,
          lng: -103.38096618652344
        },
        mapOptions: {
          styles: [
            {
              'elementType': 'geometry',
              'stylers': [
                {
                  'color': '#212121'
                }
              ]
            },
            {
              'elementType': 'labels.icon',
              'stylers': [
                {
                  'visibility': 'off'
                }
              ]
            },
            {
              'elementType': 'labels.text.fill',
              'stylers': [
                {
                  'color': '#757575'
                }
              ]
            },
            {
              'elementType': 'labels.text.stroke',
              'stylers': [
                {
                  'color': '#212121'
                }
              ]
            },
            {
              'featureType': 'administrative',
              'elementType': 'geometry',
              'stylers': [
                {
                  'color': '#757575'
                }
              ]
            },
            {
              'featureType': 'administrative.country',
              'elementType': 'labels.text.fill',
              'stylers': [
                {
                  'color': '#9e9e9e'
                }
              ]
            },
            {
              'featureType': 'administrative.land_parcel',
              'stylers': [
                {
                  'visibility': 'off'
                }
              ]
            },
            {
              'featureType': 'administrative.locality',
              'elementType': 'labels.text.fill',
              'stylers': [
                {
                  'color': '#bdbdbd'
                }
              ]
            },
            {
              'featureType': 'poi',
              'elementType': 'labels.text.fill',
              'stylers': [
                {
                  'color': '#757575'
                }
              ]
            },
            {
              'featureType': 'poi.park',
              'elementType': 'geometry',
              'stylers': [
                {
                  'color': '#181818'
                }
              ]
            },
            {
              'featureType': 'poi.park',
              'elementType': 'labels.text.fill',
              'stylers': [
                {
                  'color': '#616161'
                }
              ]
            },
            {
              'featureType': 'poi.park',
              'elementType': 'labels.text.stroke',
              'stylers': [
                {
                  'color': '#1b1b1b'
                }
              ]
            },
            {
              'featureType': 'road',
              'elementType': 'geometry.fill',
              'stylers': [
                {
                  'color': '#2c2c2c'
                }
              ]
            },
            {
              'featureType': 'road',
              'elementType': 'labels.text.fill',
              'stylers': [
                {
                  'color': '#8a8a8a'
                }
              ]
            },
            {
              'featureType': 'road.arterial',
              'elementType': 'geometry',
              'stylers': [
                {
                  'color': '#373737'
                }
              ]
            },
            {
              'featureType': 'road.highway',
              'elementType': 'geometry',
              'stylers': [
                {
                  'color': '#3c3c3c'
                }
              ]
            },
            {
              'featureType': 'road.highway.controlled_access',
              'elementType': 'geometry',
              'stylers': [
                {
                  'color': '#4e4e4e'
                }
              ]
            },
            {
              'featureType': 'road.local',
              'elementType': 'labels.text.fill',
              'stylers': [
                {
                  'color': '#616161'
                }
              ]
            },
            {
              'featureType': 'transit',
              'elementType': 'labels.text.fill',
              'stylers': [
                {
                  'color': '#757575'
                }
              ]
            },
            {
              'featureType': 'water',
              'elementType': 'geometry',
              'stylers': [
                {
                  'color': '#000000'
                }
              ]
            },
            {
              'featureType': 'water',
              'elementType': 'labels.text.fill',
              'stylers': [
                {
                  'color': '#3d3d3d'
                }
              ]
            }
          ]
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
        'User'
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
        'storePlace'
      ]),

      /**
       * Make the storePLace Attempt.
       * ------------------------------
       * @member {Function} store
       */
      store () {
        this.storePlace({
          ...this.$data,
          latitude: this.position.lat,
          longitude: this.position.lng
        }).then(() => {
          this.$router.push('/Admin/Places')
        }).catch(({ response }) => {
          this.errors = response.data
        })
      },

      /**
       * Make the storePLace Attempt.
       * ------------------------------
       * @member {Function} store
       */
      updatePosition ($event) {
        this.position = $event
        console.log('GOOGLE SEACH!')
        axios.flush(() => {
          axios.get(`https://maps.googleapis.com/maps/api/geocode/json?latlng=${$event.lat()},${$event.lng()}&key=AIzaSyAb-pcxVpILOwGT7ypK7s0tbGw6cBq8oUQ`).then(result => {
            console.log(result.data.results[0].formatted_address)
            this.address = result.data.results[0].formatted_address
          })
        })
      }
    }
  }
</script>

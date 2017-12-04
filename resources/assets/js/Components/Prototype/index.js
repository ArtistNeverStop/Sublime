import Vue from 'vue'
import axios from '@/Http'
import API from '@/Http/API'
import Files from '@/Http/API/Files'
import EntityMap from '@/Store/EntityMap'

 /**
 * Kebapize a CamelCase String.
 * ------------------------------
 * @function kebapizeCamel
 * @param {string} str
 * @return {string}
 */
String.prototype.ucfirst = function () {
  return this.charAt(0).toUpperCase() + this.slice(1)
}

/**
 * Set the Helpers on Vue instances Adding Instance Properties.
 */
Vue.prototype.$http = axios

/**
 * Return true if the current route
 * is an admin route.
 * ------------------------------
 * @member {Function}
 * @return {boolean}
 */
Vue.prototype.$adminRoute = function () {
  return this.$route.name && this.$route.name.includes('admin')
}

console.log(API)
/**
 * Atach the main HTTP actions to
 * store and destroy Resources from
 * the server.
 * ------------------------------
 */
for (let resource in API) {
  console.log(resource)
  Vue.prototype[`$persist${resource.ucfirst()}`] =
    async function persist (toPersist, files = null, replace = false, message = null) {
      var [entity, data] = [(await API[resource].save(toPersist)).data, files && (new FormData())]
      if (files) {
        for (var [index, file] of files.entries()) {
          if (file && file.file && file.file.size) {
            data.append(`files[${index}]`, file.file, file.file.name)
            data.append(`types[${index}]`, file.type)
          }
        }
        data.append('replace', replace)
        entity = {
          ...entity,
          ...((await Files.store(
            data,
            EntityMap[`${entity._entity}Resource`],
            entity.id
          )).data)
        }
      }
      Store.dispatch('loadEntities', entity)
      var name = toPersist.name || toPersist.id
      // this.$toast(message || `${resource.slice(0, -1).ucfirst()} ${name} guardado correctamente`, name)
      return entity
    }
  Vue.prototype[`$destroy${resource.ucfirst()}`] =
    async function destroy (toDestroy, message = null) {
      await API[resource].delete(toDestroy.id)
      Store.dispatch('removeEntities', toDestroy)
      var name = toDestroy.name || toDestroy.id
      // this.$toast(message || `${resource.slice(0, -1).ucfirst()} ${name} eliminado correctamente`, name)
    }
}

/**
 * Go to a nnamed route.
 * ------------------------------
 * @member {Function}
 * @return {boolean}
 */
Vue.prototype.$go = function (name, params) {
  return this.$router.push({name, params})
}

/**
 * Go to a nnamed route.
 * ------------------------------
 * @member {Function}
 * @return {boolean}
 */
Vue.prototype.mapOptions = {
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
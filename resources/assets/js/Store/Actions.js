import EntityMap from '@/Store/EntityMap'
import axios from '@/Http'
import files from '@/Http/API/Files'

/**
 * The Actions related to the Entities.
 * ------------------------------
 * @const action {Object}
 */
const actions = {

  /**
   * Get Entities From the GraphQL
   * server.
   * ------------------------------
   * @member
   * @param {Object} store
   * @param {string} type - The Entity Type (Category, Product, Uesr, etc..).
   * @param {Object} wheres - Object that describes the parameters to the graphql query.
   * @param {array} load - The sub Entities to load.
   * @param {array} parent - The object to attach the query result on VUex.
   */
  async fetch (store, [type, wheres, load = [], parent = null]) {
    let entity = ((await axios.query(type, wheres, load)).data.data)
    if (parent) {
      entity = {...parent, ...entity}
    } else {
      (entity = entity[type])
    }
    await store.dispatch('loadEntities', entity)
    return entity
  },

  /**
   * ------------------------------
   * @function
   * @param {Object} state
   * @param {Object} getters
   * @return {Function}
   */
  loadEntities ({ state, commit }, data) {
    // console.log('loadEntities', data);
    /**
     * ------------------------------
     * @function
     * @param {Object} state
     * @param {Object} getters
     * @return {Function}
     */
    (function pushEntity (entity, parent = null, field = null, index = null, insideArray = null) {
      if (Array.isArray(entity) && entity.length > 0) {
        entity.map((item, index) => {
          pushEntity(item, parent, field, index, true)
        })
      } else if (entity instanceof Object && entity._entity) {
        // console.log('pushEntity', entity)
        // Process the Entity if is an Object and has the Entity field
        var entityInfo = EntityMap[entity._entity]
        // Process the parent Entity
        if (parent) {
          // var parentStateInfo = EntityMap[parent._entity]
          if (insideArray) {
            parent[field][index] = entity.id
          } else {
            parent[field] = entity.id
          }
        }
        // Analize objects
        for (let [key, value] of Object.entries(entity)) {
          pushEntity(value, entity, key, index)
        }
        commit('loadEntity', entity)
        // BELONGS TO Aattch the id to the father object in the state
        entityInfo.belongsTo.forEach(r => {
          var rParent = state[r.entity].all[entity[r.key]]
          if (!rParent) {
            commit('loadEntity', { _entity: r.entity, id: entity[r.key], [r.field]: [] })
          }
          commit('pushToEntity', { entity: r.entity, field: r.field, id: entity[r.key], child: entity.id })
        })
      }
    })(data)
  },

  /**
   * ------------------------------
   * @function
   * @param {Object} state
   * @param {Object} getters
   * @return {Function}
   */
  removeEntities ({ state, commit }, data) {
    /**
     * ------------------------------
     * @function
     * @param {Object} state
     * @param {Object} getters
     * @return {Function}
     */
    (function removeEntity (entity, parent = null, field = null, index = null, insideArray = null) {
      // console.log('removeEntity', entity)
      if (Array.isArray(entity) && entity.length > 0) {
        entity.map((item, index) => {
          removeEntity(item, parent, field, index, true)
        })
      // Process the Entity if is an Object and has the Entity field
      } else if (entity instanceof Object && entity._entity) {
        var entityInfo = EntityMap[entity._entity]
        // BELONGS TO Detach the id to the father object in the state
        entityInfo.belongsTo.forEach(r => {
          var rParent = state[r.entity].all[entity[r.key]]
          if (parent != rParent) {
            commit('removeEntityFromRelation', { entity: r.entity, id: entity.id, key: r.key, field: r.field, parent: entity })
          }
        })
        // HAS MANY Detach the id to the father object in the state
        entityInfo.hasMany.forEach(r => {
          if (entity[r.field]) {
            entity[r.field].forEach(child => {
              if (r.cascade) {
                removeEntity(state[r.entity].all[child], entity)
              } else {
                commit('nullifyEntityFromRelation', { entity: r.entity, id: child, key: r.key })
              }
            })
          }
        })
        commit('removeEntity', entity)
      }
    })(data)
  },

  /**
   * Make a request to Store a File on the server.
   *
   * @function
   * @param commit {Object} The store mutation commiter.
   * @param data {FormData} The FormData instance data container to upload.
   * @param resource {string} The name of the resource to attach the file ex:('products', 'categories').
   * @param id {integer} The id of the resource to attach the file.
   * @return {Promise}.
  */
  storeResourceFile ({ commit }, { data, resource, id }) {
    return files.store(data, resource, id)
  },

  /**
   * Make a request to order a array of files on the server.
   *
   * @function
   * @param commit {Object} The store mutation commiter.
   * @param ids {array} The array of files ids to order in order on the server.
   * @return {Promise}.
  */
  orderRemoteFiles ({ commit }, ids) {
    return files.order(ids)
  },

  /**
   * ------------------------------
   * @function
   * @param {Object} state
   * @param {Object} getters
   * @return {Function}
   */
  deleteFile ({ dispatch }, { resource, id }) {
    return new Promise((resolve, reject) => {
      files.delete(resource, id).then(({ data }) => {
        dispatch('loadEntities', data)
        resolve(id)
      }).catch(reject)
    })
  }
}

export default actions

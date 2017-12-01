import Vue from 'vue'

/**
 * The Mutations related to the Entities.
 * ------------------------------
 * @const action {Object}
 */
const mutations = {

  /**
   * Set the selected property on an Entity Module state.
   * ------------------------------
   * @member {Function}
   * @param state {Object} The main state of the App.
   * @param entity {Object|string} The Entity Module name.
   * @param value {integer} The id value to select.
   */
  selectEntity (state, entity) {
    let value = entity.value || entity.id
    entity = entity._entity || entity.entity
    state[entity].selected = value
  },

  /**
   * ------------------------------
   * @function
   */
  removeEntity (state, entity) {
    // console.log('removeEntity', entity)
    Vue.delete(state[entity._entity].all, entity.id)
    state[entity._entity].list.splice(state[entity._entity].list.indexOf(entity.id), 1)
  },

  /**
   * ------------------------------
   * @function
   * @param {Object} state
   * @param {Object} entity
   */
  loadEntity (state, entity) {
    // console.log('loadEntity', entity)
    // DB.insert(entity._entity, entity)
    if (entity._entity === 'ProductAttribute') {
      entity.value = entity[entity.column]
    }
    Vue.set(state[entity._entity].all, entity.id, { ...state[entity._entity].all[entity.id], ...entity })
    if (state[entity._entity].list.indexOf(entity.id) < 0) {
      state[entity._entity].list.push(entity.id)
    }
  },

  /**
   * ------------------------------
   * @function
   * @param {Object} state
   * @param {Object} relation
   */
  pushToEntity (state, relation) {
    var field = state[relation.entity].all[relation.id][relation.field]
    if (!field) {
      Vue.set(state[relation.entity].all[relation.id], relation.field, [])
    }
    if (field instanceof Array && field.indexOf(relation.child) < 0) {
      field.push(relation.child)
    }
  },

  /**
   * ------------------------------
   * @function
   * @param {Object} state
   * @param {String} entity
   * @param {String} key
   * @param {String} field
   * @param {int} id
   * @param {String} parent
   */
  removeEntityFromRelation (state, { entity, key, field, id, parent }) {
    state[entity].all[parent[key]][field].splice(state[entity].all[parent[key]][field].indexOf(id), 1)
  },

  /**
   * ------------------------------
   * @function
   * @param {Object} state
   * @param {String} entity
   * @param {String} key
   * @param {int} id
   */
  nullifyEntityFromRelation (state, { entity, key, id }) {
    if (state[entity].all[id]) {
      state[entity].all[id][key] = null
    }
  }
}

export default mutations

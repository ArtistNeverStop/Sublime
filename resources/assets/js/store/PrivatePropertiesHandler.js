export default class PrivatePropertiesHandler {

  /**
   * The PrivatePropertiesHandler Object
   * ------------------------------
   * {constructor}
   */
  constructor () {
    //
  }

  static make () {
    return {
      get: this.get,
      set: this.set
    }
  }

  static get (target, property, receiver) {
    // If prevent error for [[Symbols]].
    if (typeof property !== 'string') {
      return target[property]
    } else if (!property.startsWith('$')) {
      return target[property]
    }
  }

  static set (target, property, value, receiver) {
    // console.debug('SET!!', property, value)
    if (!property.startsWith('$')) {
      return target[property] = value
    }    
  }
}
import PrivatePropertiesHandler from './PrivatePropertiesHandler'
import Watcher from './Watcher'

export default class Model {

  /**
   * All the properties the startwith $
   * are protected.
   * ------------------------------
   * {constructor}
   */
  constructor (attributes) {
    Object.assign(this, attributes)
    this.definePrivateProperties({
      '$key': 'id'
    })
    this.parent = Watcher.models[this.constructor.name]
    this.existence()
    Watcher.add(this)
  }

  definePrivateProperties (properties) {
    for (let key in properties) {
      Object.defineProperty(this, key, {
        value: properties[key],                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
        enumerable: false,
        writable: true,
        configurable: false
      })
    }
  }

  set key (key) {
    this.$key = key
  }

  get key () {
    return this.$key
  }

  is (model) {
    return model instanceof Model && this[this.key] === model[model.key]
  }

  save () {
    this.parent && this.parent.updateIfIsMe(this)
    // Watcher.notify(this)
  }

  updateIfIsMe (model) {
    if (this.is(model)) {
      console.log('updateIfIsMe')
      Object.assign(this, model)
    }
  }

  existence (soon) {
    if (this.is(this.soon)) {
      return true
    } else if (this.parent                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      && this.parent.existence(this)) {
      this.parent = this
    }
  }
}
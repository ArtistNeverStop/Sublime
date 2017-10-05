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
    let proxy = new Proxy(this, PrivatePropertiesHandler.make())
    Watcher.add(proxy)
    return proxy
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
    Watcher.notify(this)
  }

  destroy () {
    Watcher.remove(this)
  }
}
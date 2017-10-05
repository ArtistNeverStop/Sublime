import PrivatePropertiesHandler from './PrivatePropertiesHandler'

class Watcher {

  /**
   * The Watcher Singleton.
   * ------------------------------
   * {constructor}
   */
  constructor () {
    // Console debug for explictly know that this is instanced once.
    console.log('Wathcer constructor')
    if(! Watcher.instance){
      this.$models = {}
      Watcher.instance = new Proxy(this, PrivatePropertiesHandler.make())
    }
    return Watcher.instance
  }

  /**
   * Order and store the model
   * instances.
   * ------------------------------
   * @param model {Model}
   */
  add (model) {
    this.addModelClass(model)
    this.models[model.constructor.name].push(model)
  }

  /**
   * Add the model class to the
   * instance array.
   * ------------------------------
   * @param model {Model}
   */
  addModelClass (model) {
    if (!this.models[model.constructor.name]) {
      this.models[model.constructor.name] = []
    }
  }

  /**
   * Update the instances on the
   * instance array.
   * ------------------------------
   * @param model {Model}
   */
  remove (model) {
    for (var i = this.models[model.constructor.name].length - 1; i >= 0; i--) {
      if (model === this.models[model.constructor.name][i]) {
        return this.models[model.constructor.name].splice(i, 1)
      }
    }
  }

  /**
   * Update the instances on the
   * instance array.
   * ------------------------------
   * @param model {Model}
   */
  notify (model) {
    for (var i = this.models[model.constructor.name].length - 1; i >= 0; i--) {
      if (model.is(this.models[model.constructor.name][i])) {
        Object.assign(this.models[model.constructor.name][i], model)
      }
    }
  }

  /**
   * Update the instances on the
   * instance array.
   * ------------------------------
   * @param model {Model}
   */
  destroy () {

  }

  get models () {
    return this.$models
  }

  // set model () {
  //   this.$models
  // }
}
const WatcherInstance = new Watcher()
export default WatcherInstance
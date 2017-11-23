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
      // this.$models = new WeakMap()
      this.models = {}
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
    // this.addModelClass(model)
    this.models[model.constructor.name] = model
    // this.models.set(model, model[model.key])
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
  notify (model) {
    console.log(model)
    // this.models[model.constructor.name].forEach(toUpdate => {
    //   if (model.is(toUpdate)) {
    //     Object.assign(toUpdate, model)
    //   }
    // })
  }

  // get models () {
  //   return this.models
  // }

  // set models (models) {
  //   this.models = models
  // }
}
const WatcherInstance = new Watcher()
export default WatcherInstance
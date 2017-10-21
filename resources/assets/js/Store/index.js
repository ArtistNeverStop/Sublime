import Vue from 'vue'
import Vuex from 'vuex'

// import ProductAttribute from './Modules/ProductAttribute'
// import ProductTopic from './Modules/ProductTopic'
// import Subcategory from './Modules/Subcategory'
// import SpecOption from './Modules/SpecOption'
// import Department from './Modules/Department'
// import SpecGroup from './Modules/SpecGroup'
// import Category from './Modules/Category'
// import Feature from './Modules/Feature'
// import Product from './Modules/Product'
// import Answer from './Modules/Answer'
// import Banner from './Modules/Banner'
// import Review from './Modules/Review'
// import Status from './Modules/Status'
// import mutations from './mutations'
// import Spec from './Modules/Spec'
import User from '@/Store/Modules/User'
// import actions from './actions'
// import getters from './getters'

Vue.use(Vuex)

export default new Vuex.Store({
  strict: true,
  state: {},
  // mutations,
  // actions,
  // getters,
  modules: {
    // ProductAttribute,
    // ProductTopic,
    // Subcategory,
    // SpecOption,
    // Department,
    // SpecGroup,
    // Category,
    // Feature,
    // Product,
    // Review,
    // Banner,
    // Status,
    // Answer,
    // Spec,
    User
  }
})

export default {

  /**
   * The data of the Aplication Users
   * ------------------------------
   * @member {Object}
   */
  User: {
    hasMany: [
      // {
      //   entity: 'Review',
      //   field: 'reviews',
      //   key: 'user_id'
      // }
    ],
    belongsTo: [
      //
    ]
  },

  // /**
  //  * The state module maped by it resource name.
  //  */
  // categories: 'Category',
  // subcategories: 'Subcategory',
  // departments: 'Department',
  // users: 'User',
  // banners: 'Banner',
  // answers: 'Answer',
  // producttopics: 'ProductTopic',
  // products: 'Product',
  // productattributes: 'ProductAttribute',
  // specs: 'Spec',
  // specoptions: 'SpecOption',
  // specGroups: 'SpecGroup',
  // features: 'Feature',
  // reviews: 'Review',

  // /**
  //  * The Resource module maped by it Entity name.
  //  */
  // CategoryResource: 'categories',
  // SubcategoryResource: 'subcategories',
  // DepartmentResource: 'departments',
  // UserResource: 'users',
  // BannerResource: 'banners',
  // AnswerResource: 'answers',
  // ProductTopicResource: 'producttopics',
  // ProductResource: 'products',
  // ProductAttributeResource: 'productattributes',
  // SpecResource: 'specs',
  // SpecOptionResource: 'specoptions',
  // SpecGroupResource: 'specGroups',
  // FeatureResource: 'features',
  // ReviewResource: 'reviews',

  // /**
  //  * Map the Graph relations to the form:
  //  */
  // Banner: {
  //   hasMany: [],
  //   belongsTo: []
  // },
  // Answer: {
  //   hasMany: [],
  //   belongsTo: [
  //     {
  //       entity: 'ProductTopic',
  //       field: 'answers',
  //       key: 'topic_id'
  //     }
  //   ]
  // },
  // ProductTopic: {
  //   hasMany: [],
  //   belongsTo: [
  //     {
  //       entity: 'Product',
  //       field: 'topics',
  //       key: 'product_id'
  //     },
  //     {
  //       entity: 'User',
  //       field: 'topics',
  //       key: 'user_id'
  //     }
  //   ]
  // },
  // Product: {
  //   hasMany: [
  //     {
  //       entity: 'Specs',
  //       field: 'specs',
  //       key: 'product_id'
  //     },
  //     {
  //       entity: 'Review',
  //       field: 'reviews',
  //       key: 'product_id'
  //     }
  //   ],
  //   belongsTo: [
  //     {
  //       entity: 'Subcategory',
  //       field: 'category',
  //       key: 'subcategory_id'
  //     }
  //   ]
  // },
  // ProductAttribute: {
  //   hasMany: [],
  //   belongsTo: [
  //     {
  //       entity: 'Product',
  //       field: 'attributes',
  //       key: 'product_id'
  //     }
  //   ]
  // },
  // Department: {
  //   hasMany: [
  //     {
  //       entity: 'Category',
  //       field: 'categories',
  //       key: 'department_id'
  //     }
  //   ],
  //   belongsTo: []
  // },
  // Category: {
  //   hasMany: [
  //     {
  //       entity: 'Subcategory',
  //       field: 'subcategories',
  //       key: 'category_id',
  //       cascade: true
  //     }
  //   ],
  //   belongsTo: [
  //     {
  //       entity: 'Department',
  //       field: 'subcategories',
  //       key: 'category_id'
  //     }
  //   ]
  // },
  // Subcategory: {
  //   hasMany: [],
  //   belongsTo: [
  //     {
  //       entity: 'Category',
  //       field: 'subcategories',
  //       key: 'category_id'
  //     }
  //   ]
  // },
  // Spec: {
  //   hasMany: [],
  //   belongsTo: [
  //     {
  //       entity: 'Subcategory',
  //       field: 'specs',
  //       key: 'subcategory_id'
  //     }
  //   ]
  // },
  // SpecOption: {
  //   hasMany: [],
  //   belongsTo: [
  //     {
  //       entity: 'Spec',
  //       field: 'options',
  //       key: 'spec_id',
  //       cascade: false
  //     }
  //   ]
  // },
  // SpecGroup: {
  //   hasMany: [
  //     {
  //       entity: 'Spec',
  //       field: 'specs',
  //       key: 'group_id'
  //     }
  //   ],
  //   belongsTo: [
  //     {
  //       entity: 'Subcategory',
  //       field: 'specGroups',
  //       key: 'subcategory_id'
  //     }
  //   ]
  // },
  // Feature: {
  //   hasMany: [],
  //   belongsTo: [
  //     {
  //       entity: 'Subcategory',
  //       field: 'features',
  //       key: 'subcategory_id'
  //     }
  //   ]
  // },
  // Review: {
  //   hasMany: [],
  //   belongsTo: [
  //     // {
  //     //   entity: 'Product',
  //     //   field: 'reviews',
  //     //   key: 'product_id',
  //     // }
  //     {
  //       entity: 'User',
  //       field: 'reviews',
  //       key: 'user_id'
  //     }
  //   ]
  // }
}

var schema = {
  stores: `
_entity: entity
name
id
url
`,
  tags: `
_entity: entity
name
id
`,
  attribute: `
_entity: entity
id
spec_id
product_id
type
filterable
integer_value
string_value
date_value
time_value
double_value
boolean_value
range_value {
  _entity: entity
  id
  spec_id
  name
}
options_value {
  _entity: entity
  id
  spec_id
  name
}
is_option
column
`,
  spec: `
_entity: entity
subcategory_id
main_group_id
product_id
group_id
user_id
id
max
min
name
unit
type
filterable
comparable
html_input_type
`,
  specGroup: `
_entity: entity
subcategory_id
image_url
id
type
name
`,
  option: `
_entity: entity
id
spec_id
name
`,
  feature: `
_entity: entity
id
subcategory_id
name
`,
  category: `
_entity: entity
department_id
id
name
url`,
  department: `
_entity: entity
id
name
url`,
  subcategory: `
_entity: entity
category_id
id
name
url`,
  product: `
_entity: entity
id
created_at
updated_at
description
subcategory_id
name
main_image {
  url
  id
  type
}
url`,
  user: `
_entity: entity
id
name
url`,
  pageInfo: `
_entity: entity
id
name
url
`,
  image: `
id
url
`
}
schema.images = schema.image
schema.attributes = schema.attribute
schema.unique_attribute = schema.attribute
schema.unique_attributes = schema.attribute
schema.products = schema.product
schema.categories = schema.category
schema.subcategories = schema.subcategory
schema.departments = schema.department
schema.users = schema.user
schema.features = schema.feature
schema.specs = schema.spec
schema.options = schema.option
schema.specGroups = schema.specGroup
schema.mainspec = schema.spec
schema.mainspecs = schema.spec

function query (type, load = [], params = null, n = 0) {
  if (!schema[type]) {
    console.warn(`TYPE ${type} DOES NOT EXIST ON THE SCHEMA`)
  }
  return (`
${'  '.repeat(n) + type.split('\n').join('\n' + '  '.repeat(n++))} ${params ? `(${Object.keys(params).map(p => `${p}: ${params[p]}`).join(', ')})` : ''} {
${'  '.repeat(n) + schema[type].split('\n').join('\n' + '  '.repeat(n))}
${'  '.repeat(n) + load.map(c => {
  var toLoad = c.split('.')
  var nestType = toLoad.shift()
  toLoad = toLoad.join('.')
  return nestType && query(nestType, [toLoad], '', n)
})}
${'  '.repeat(n)}}
`)
}

function mutation (type, params = null, load = [], n = 0) {
  return (`
${'  '.repeat(n) + type.split('\n').join('\n' + '  '.repeat(n++))} ${params ? `(${Object.keys(params).map(p => `${p}: $${p}`).join(', ')})` : ''} {
${'  '.repeat(n) + schema[type].split('\n').join('\n' + '  '.repeat(n))}
${'  '.repeat(n) + load.map(c => {
  var toLoad = c.split('.')
  var nestType = toLoad.shift()
  toLoad = toLoad.join('.')
  return nestType && query(nestType, [toLoad], '', n)
})}
${'  '.repeat(n)}}
`)
}

export { query, mutation }

/**
 * Site sections
 */
import Site from '@/components/Sections'

/**
 * Shortcut function to make a new
 * route object.
 * ------------------------------
 * @const route {Function}
 * @param path {string}
 * @param component {VueComponent}
 * @param meta {Object}
 * @param name {string}
 * @param children {array}
 * @param beforeEnter @function
 * @return {Object}
 */
const route = (
  path,
  component,
  name,
  meta,
  children,
  beforeEnter
) => Object.assign({
  path, name, meta, children, beforeEnter
}, typeof component === 'string' ? { redirect: component } : {component})

/**
 * The routes of the app in a
 * route object.
 * ------------------------------
 * @const {Array}
 */
const routes = [
  route('/', Site.Home)
]

export default routes

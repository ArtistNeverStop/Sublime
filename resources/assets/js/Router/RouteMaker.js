
/**
 * Shortcut function to make a new
 * route object.
 * ------------------------------
 * @function route
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

export default route

/**
 * Kebapize a CamelCase String.
 * ------------------------------
 * @function kebapizeCamel
 * @param {string} str
 * @return {string}
*/
export const kebapizeCamel = function (str) {
  return str.replace(/([a-z])([A-Z])/g, '$1-$2').toLowerCase()
}

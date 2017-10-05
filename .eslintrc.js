module.exports = {
  root: 1,
  parser: 'babel-eslint',
  env: {
    browser: 1,
    jquery: 1
  },
  // Use window to call these globals.
  // globals: {
  //   _: 1
  // },
  // https://github.com/feross/standard/blob/master/RULES.md#javascript-standard-style
  extends: 'standard',
  // required to lint *.vue files
  plugins: [
    'html'
  ],
  // add your custom rules here
  'rules': {
    // allow paren-less arrow functions
    'arrow-parens': 0,
    // allow async-await
    'generator-star-spacing': 0,
    // allow debugger during development
    'no-debugger': 0,
    // allow to use new Vue.
    'no-new': 0
  }
}
import Site from '@/Components/Sections'
import Route from '@/Router/RouteMaker'
import store from '@/Store'

/**
 * The Routes of the app in a
 * Route object.
 * ------------------------------
 * @const {Array}
 */
export default [
  Route('/Admin/Dashboard', Site.Admin.AdminDashboard, 'admin.dashboard', { admin: true }),
  Route('/Dashboard', Site.User.Dashboard, 'dashboard', { auth: true }),
  Route('/Login', Site.Login, 'login', { guest: true }),
  Route('/Logout', '', 'logout', { auth: true }, null, () => store.dispatch('logout')),
  Route('/', Site.Home, 'home'),
  Route('*', Site.Errors._404, '404')
]

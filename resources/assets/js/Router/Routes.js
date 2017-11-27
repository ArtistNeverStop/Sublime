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
  Route('/Admin', Site.Admin.Section, 'admin', { admin: true }, [
    Route('Dashboard', Site.Admin.Dashboard, 'admin.dashboard'),
    Route('Artists', Site.Admin.Requests.Section, 'admin.artists.requests.requests', null, [
      Route('Requests', Site.Admin.Requests.Index, 'admin.artists.requests.requests.index')
    ]),
    Route('Places', Site.Admin.Places.Index, 'admin.places.index', null, [
      // Route('Requests', Site.Admin.Requests.Index, 'admin.artists.requests.requests.index')
    ]),
    Route('Places/New', Site.Admin.Places.New, 'admin.places.new')
  ]),
  Route('/Manage-artists', Site.Artists.Manage.Index, 'artists.manage.index'),
  Route('/Manage-artists/:artist', Site.Artists.Manage.Dates, 'artists.manage.dates'),
  Route('/Manage-artists/Map', Site.Artists.ManageMap, 'artists.manage.map'),

  Route('/Artists', Site.Artists.Index, 'artists'),
  Route('/Become-an-artist', Site.User.BecomeAnArtist, 'user.become.an.artist', { auth: true }),
  Route('/Dashboard', Site.User.Dashboard, 'dashboard', { auth: true }),
  Route('/Login', Site.Login, 'login', { guest: true }),
  Route('/Register', Site.Register, 'register', { guest: true }),
  Route('/Logout', '', 'logout', null, null, () => store.dispatch('logout', '/')),
  Route('/', Site.Home, 'home'),
  Route('*', Site.Errors._404, '404')
]

import Site from '@/Components/Sections'
import Route from '@/Router/RouteMaker'
import store from '@/Store'

/**
 * The Routes of the Site in a
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

  // Route('/Artists', Site.Artists.Index, 'artists.index'),
  // Route('/Dashboard', Site.User.Dashboard, 'dashboard', { auth: true }),
  // Route('/Register', Site.Register, 'register', { guest: true }),
  // Route('/', Site.Home, 'home'),
  // Route('*', Site.Errors._404, '404')
  
  Route('/', Site.Client.Section, null, {}, [
    Route('', Site.Client.Site.Welcome, 'welcome', { guest: true }),
    Route('About', 'Acerca-de-nosotros'),
    Route('Acerca-de-nosotros', Site.Client.Site.About, 'about', { guest: true }),
    Route('Login', Site.Client.Auth.Login, 'login', { guest: true }),
    Route('Register', 'Registrate'),
    Route('Registrate', Site.Client.Auth.Login, 'register', { guest: true }),
    Route('Logout', '', 'logout', null, null, () => store.dispatch('logout', '/')),
    Route('Dashboard', Site.Client.Users.Dashboard, 'dashboard', { auth: true }),

    Route('Artistas', Site.Client.Artists.Index, 'artists.index'),
    Route('Artistas/:artist', Site.Client.Artists.Detail, 'artists.detail'),

    Route('/Manage-artists', Site.Client.Artists.Manage.Index, 'artists.manage.index'),
    Route('/Manage-artists/:artist', Site.Client.Artists.Manage.Info, 'artists.manage.info'),
    Route('/Manage-artists/:artist/Dates', Site.Client.Artists.Manage.Dates, 'artists.manage.dates'),
    // Route('/Manage-artists/Map', Site.Artists.ManageMap, 'artists.manage.map'),
    Route('Become-an-artist', Site.Client.Users.BecomeAnArtist, 'user.become.an.artist', { auth: true }),

    Route('Configuracion', Site.Client.Users.Settings, 'users.settings'),
  ]),
  Route('*', Site.Errors._404, '404')
]

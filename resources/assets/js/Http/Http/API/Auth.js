import axios from '@/Http'

export default {
  login: credentials => axios.post(`/login`, credentials),
  logout: credentials => axios.post(`/logout`),
  register: user => axios.post(`/register`, user),
  // me: () => axios.get(`/api/graphql/query={me}`),
  me: () => axios.get(`/me`),
  loadUser: (id, load = []) => axios.get(`/users/${id}?${load.map(s => `with[]=${s}`).join('&')}`)
}

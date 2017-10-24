import axios from '@/Http'

export default {
  me: () => axios.get('/me'),
  login: credentials => axios.post('/login', credentials),
  logout: () => axios.post('/logout'),
  register: user => axios.post('/register', user)
}

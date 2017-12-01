import axios from '@/Http'

export default {
  make: request => axios.post('/requests', request),
  get: () => axios.get('/requests'),
  mine: () => axios.get('/my/requests'),
  update: request => axios.put('/requests/' + request.id, request)
}

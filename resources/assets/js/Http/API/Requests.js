import axios from '@/Http'

export default {
  make: request => axios.post('/requests', request),
  get: () => axios.get('/requests'),
  mine: () => axios.get('/my/requests'),
  update: request => axios.put('/requests/' + request.id, request),

  save: request => axios[request.id ? 'put': 'post']('/requests' + (request.id ? `/${requests.id}`: '')),
  delete: id => axios.delete('/requests/' + id)
}

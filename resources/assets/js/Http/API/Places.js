import axios from '@/Http'

export default {
  get: () => axios.get('/places'),
  store: place => axios.post('/places', place),
  update: place => axios.put('/places/' + place.id, place),
  delete: id => axios.delete('/places/' + id),
}

import axios from '@/Http'

export default {
  get: () => axios.get('/artists'),
  mine: () => axios.get('/me/artists'),
  makeAvailableOnPlace: request => axios.post('/me/artists/places', request),
  save: artist => axios[artist.id ? 'put': 'post']('/artists' + (artist.id ? `/${artist.id}`: ''), artist),
  delete: id => axios.delete('/artists/' + id)
}

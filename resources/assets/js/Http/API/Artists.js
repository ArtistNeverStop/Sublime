import axios from '@/Http'

export default {
  get: () => axios.get('/artists'),
  mine: () => axios.get('/me/artists'),
  makeAvailableOnPlace: request => axios.post('/me/artists/places', request),
}

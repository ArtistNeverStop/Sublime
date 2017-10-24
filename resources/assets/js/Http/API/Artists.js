import axios from '@/Http'

export default {
  get: () => axios.get('/artists'),
}

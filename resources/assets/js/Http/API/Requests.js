import axios from '@/Http'

export default {
  make: request => axios.post('/requests', request),
  // get: (fields = ['id']) => axios.get('/graphql', {
  //   params: {
  //     query: `query {
  //       requests {
  //         ${fields.indexOf('id') >= 0 ? 'id,' : ''}
  //         ${fields.indexOf('name') >= 0 ? 'name,' : ''}
  //         ${fields.indexOf('user_name') >= 0 ? 'user_name,' : ''}
  //         ${fields.indexOf('email') >= 0 ? 'email,' : ''}
  //       }
  //     }`
  //   }
  // })
  get: () => axios.get('/requests'),
  update: request => axios.put('/requests/' + request.id, request),
}

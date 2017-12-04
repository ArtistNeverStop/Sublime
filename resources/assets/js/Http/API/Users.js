import axios from '@/Http'

export default {
  get: (params = ['id']) => axios.get('/graphql', {
    params: {
      query: `query {
        users {
          ${params.indexOf('id') >= 0 ? 'id,' : ''}
          ${params.indexOf('name') >= 0 ? 'name,' : ''}
          ${params.indexOf('user_name') >= 0 ? 'user_name,' : ''}
          ${params.indexOf('email') >= 0 ? 'email,' : ''}
        }
      }`
    }
  }),

  save: user => axios[user.id ? 'put': 'post']('/users' + (user.id ? `/${users.id}`: '')),
  delete: id => axios.delete('/users/' + id)
}

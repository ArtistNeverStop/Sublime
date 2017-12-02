import axios from 'axios'

export default {
  order: files => axios.put(`files/order`, { files }),
  delete: (resource, id) => axios.delete(`files/${resource}/${id}`),
  store: (data, resource, id) => axios.post(`files/${resource}/${id}`, data, { headers: { 'content-type': 'multipart/form-data' } })
}

import axios from '@/Http'

export default {
  save: s => axios[s.id ? 'put' : 'post'](`subcategories/${s.subcategory_id || s.subcategory}/specGroups${s.id ? `/${s.id}` : ``}`, s),
  delete: id => axios.delete(`specGroups/${id}`)
}

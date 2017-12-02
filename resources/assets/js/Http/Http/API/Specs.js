import axios from '@/Http'

export default {
  save: s => axios[s.id ? 'put' : 'post'](s.subcategory_id ? `subcategories/${s.subcategory_id}/specs${s.id ? `/${s.id}` : ``}` : `specs${s.id ? `/${s.id}` : ``}`, s),
  delete: id => axios.delete(`specs/${id}`)
}

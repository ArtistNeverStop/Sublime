import axios from '@/Http'

export default {
  save: f => axios[f.id ? 'put' : 'post'](`subcategories/${f.subcategory_id || f.subcategory}/features${f.id ? `/${f.id}` : ``}`, f),
  delete: id => axios.delete(`features/${id}`)
}

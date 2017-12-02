import axios from 'axios'

export default {
  save: product => axios[product.id ? 'put' : 'post'](`/products/${product.id || ''}`, product),
  delete: id => axios.delete(`/products/${id}`),
  deleteMany: ids => axios.post(`/products`, {
    _method: 'DELETE',
    ids: ids
  }),
  inCategory: category => axios.get(`/categories/${category}/products`),
  storeAttributes: product => axios.post(`/products/${product.id}/attributes`, product),
  searchProductsAndCategories: search => axios.get(`search/productsAndCategories?search=${search}`),
  addToWishlist: id => axios.post(`wishlist/${id}`),
  removeFromWishlist: id => axios.delete(`wishlist/${id}`)
}

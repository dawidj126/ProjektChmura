import api from './api'

export const propertyService = {
  list:    (params)       => api.get('/properties', { params }),
  get:     (slug)         => api.get(`/properties/${slug}`),

  ownerList:    ()        => api.get('/owner/properties'),
  ownerGet:     (id)      => api.get(`/owner/properties/${id}`),
  ownerCreate:  (data)    => api.post('/owner/properties', data),
  ownerUpdate:  (id, data)=> api.put(`/owner/properties/${id}`, data),
  ownerDelete:  (id)      => api.delete(`/owner/properties/${id}`),

  uploadImage:  (id, form)=> api.post(`/owner/properties/${id}/images`, form, {
    headers: { 'Content-Type': 'multipart/form-data' },
  }),
  setMainImage: (id, imgId) => api.patch(`/owner/properties/${id}/images/${imgId}/main`),
  deleteImage:  (id, imgId) => api.delete(`/owner/properties/${id}/images/${imgId}`),
}

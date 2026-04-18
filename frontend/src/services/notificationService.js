import api from './api'

export const notificationService = {
  list:    ()    => api.get('/notifications'),
  read:    (id)  => api.patch(`/notifications/${id}/read`),
  readAll: ()    => api.post('/notifications/read-all'),
}

import { requireGuest } from '@/router/guards'

export default [
  {
    path: '/auth/logowanie',
    name: 'login',
    component: () => import('@/views/auth/LoginView.vue'),
    beforeEnter: requireGuest,
  },
  {
    path: '/auth/rejestracja',
    name: 'register',
    component: () => import('@/views/auth/RegisterView.vue'),
    beforeEnter: requireGuest,
  },
  {
    path: '/auth/reset-hasla',
    name: 'forgot-password',
    component: () => import('@/views/auth/ForgotPasswordView.vue'),
    beforeEnter: requireGuest,
  },
]

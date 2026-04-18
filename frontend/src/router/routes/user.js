import { requireAuth } from '@/router/guards'

export default [
  {
    path: '/panel',
    component: () => import('@/layouts/UserPanelLayout.vue'),
    beforeEnter: requireAuth,
    children: [
      { path: '',          redirect: '/panel/dashboard' },
      { path: 'dashboard', name: 'user-dashboard',  component: () => import('@/views/user/DashboardView.vue') },
      { path: 'profil',    name: 'user-profile',    component: () => import('@/views/user/ProfileView.vue') },
      { path: 'ulubione',  name: 'user-favorites',  component: () => import('@/views/user/FavoritesView.vue') },
      { path: 'rezerwacje',name: 'user-viewings',   component: () => import('@/views/user/ViewingsView.vue') },
      { path: 'wiadomosci',name: 'user-messages',   component: () => import('@/views/user/MessagesView.vue') },
    ],
  },
]

import { requireRole } from '@/router/guards'

export default [
  {
    path: '/admin',
    component: () => import('@/layouts/AdminPanelLayout.vue'),
    beforeEnter: requireRole('admin'),
    children: [
      { path: '',           redirect: '/admin/dashboard' },
      { path: 'dashboard',  name: 'admin-dashboard',  component: () => import('@/views/admin/DashboardView.vue') },
      { path: 'uzytkownicy',name: 'admin-users',      component: () => import('@/views/admin/UsersView.vue') },
      { path: 'oferty',     name: 'admin-properties', component: () => import('@/views/admin/PropertiesView.vue') },
      { path: 'zgloszenia', name: 'admin-contact',    component: () => import('@/views/admin/ContactMessagesView.vue') },
      { path: 'blog',       name: 'admin-blog',       component: () => import('@/views/admin/BlogView.vue') },
      { path: 'strony',     name: 'admin-pages',      component: () => import('@/views/admin/PagesView.vue') },
      { path: 'ustawienia', name: 'admin-settings',   component: () => import('@/views/admin/SettingsView.vue') },
      { path: 'logi',       name: 'admin-logs',       component: () => import('@/views/admin/ActivityLogsView.vue') },
    ],
  },
]

import { requireRole } from '@/router/guards'

export default [
  {
    path: '/wlasciciel',
    component: () => import('@/layouts/OwnerPanelLayout.vue'),
    beforeEnter: requireRole('owner'),
    children: [
      { path: '',            redirect: '/wlasciciel/dashboard' },
      { path: 'dashboard',   name: 'owner-dashboard',  component: () => import('@/views/owner/DashboardView.vue') },
      { path: 'oferty',      name: 'owner-properties', component: () => import('@/views/owner/PropertiesView.vue') },
      { path: 'oferty/nowa', name: 'owner-property-create', component: () => import('@/views/owner/PropertyFormView.vue') },
      { path: 'oferty/:id/edytuj', name: 'owner-property-edit', component: () => import('@/views/owner/PropertyFormView.vue') },
      { path: 'wiadomosci',  name: 'owner-messages',   component: () => import('@/views/owner/MessagesView.vue') },
      { path: 'rezerwacje',  name: 'owner-viewings',   component: () => import('@/views/owner/ViewingsView.vue') },
      { path: 'umowy',       name: 'owner-contracts',  component: () => import('@/views/owner/ContractsView.vue') },
      { path: 'platnosci',   name: 'owner-payments',   component: () => import('@/views/owner/PaymentsView.vue') },
    ],
  },
]

import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import publicRoutes from './routes/public'
import authRoutes   from './routes/auth'
import userRoutes   from './routes/user'
import ownerRoutes  from './routes/owner'
import adminRoutes  from './routes/admin'

const routes = [
  ...publicRoutes,
  ...authRoutes,
  ...userRoutes,
  ...ownerRoutes,
  ...adminRoutes,
  { path: '/:pathMatch(.*)*', name: 'not-found', component: () => import('@/views/public/NotFoundView.vue') },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) return savedPosition
    return { top: 0 }
  },
})

router.beforeEach(async (to) => {
  const auth = useAuthStore()
  await auth.init()
})

export default router

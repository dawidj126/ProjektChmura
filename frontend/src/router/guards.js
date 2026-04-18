import { useAuthStore } from '@/stores/auth'

export function requireAuth(to, from, next) {
  const auth = useAuthStore()
  if (!auth.isLoggedIn) return next({ path: '/auth/logowanie', query: { redirect: to.fullPath } })
  next()
}

export function requireGuest(to, from, next) {
  const auth = useAuthStore()
  if (auth.isLoggedIn) return next('/')
  next()
}

export function requireRole(role) {
  return (to, from, next) => {
    const auth = useAuthStore()
    if (!auth.isLoggedIn) return next({ path: '/auth/logowanie', query: { redirect: to.fullPath } })
    if (auth.role !== role) return next('/')
    next()
  }
}

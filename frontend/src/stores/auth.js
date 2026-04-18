import { defineStore } from 'pinia'
import { ref, computed } from 'vue'
import { authService } from '@/services/authService'

export const useAuthStore = defineStore('auth', () => {
  const token = ref(localStorage.getItem('token') || null)
  const user  = ref(null)

  const isLoggedIn = computed(() => !!token.value)
  const role       = computed(() => user.value?.role ?? 'guest')
  const isOwner    = computed(() => role.value === 'owner')
  const isAdmin    = computed(() => role.value === 'admin')
  const isUser     = computed(() => role.value === 'user')

  function setToken(newToken) {
    token.value = newToken
    localStorage.setItem('token', newToken)
  }

  async function fetchUser() {
    const { data } = await authService.me()
    user.value = data.data
  }

  async function logout() {
    try { await authService.logout() } catch {}
    token.value = null
    user.value  = null
    localStorage.removeItem('token')
  }

  async function init() {
    if (token.value && !user.value) {
      try { await fetchUser() } catch { await logout() }
    }
  }

  return { token, user, isLoggedIn, role, isOwner, isAdmin, isUser, setToken, fetchUser, logout, init }
})

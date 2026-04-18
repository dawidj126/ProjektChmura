<script setup>
import { RouterLink, RouterView, useRoute, useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import { useToast }     from 'vue-toastification'

const auth   = useAuthStore()
const route  = useRoute()
const router = useRouter()
const toast  = useToast()

const navLinks = [
  { to: '/admin/dashboard',   label: 'Dashboard' },
  { to: '/admin/uzytkownicy', label: 'Użytkownicy' },
  { to: '/admin/oferty',      label: 'Oferty' },
  { to: '/admin/zgloszenia',  label: 'Zgłoszenia' },
  { to: '/admin/blog',        label: 'Blog' },
  { to: '/admin/strony',      label: 'Strony' },
  { to: '/admin/ustawienia',  label: 'Ustawienia' },
  { to: '/admin/logi',        label: 'Logi' },
]

async function handleLogout() {
  await auth.logout()
  toast.success('Wylogowano.')
  router.push('/')
}
</script>

<template>
  <div class="min-h-screen flex bg-gray-100">
    <aside class="w-64 bg-gray-900 text-white flex flex-col p-4 shrink-0">
      <RouterLink to="/" class="font-bold text-white text-lg mb-2 block">NajmujMieszkanie</RouterLink>
      <p class="text-xs text-gray-400 mb-6">Panel administratora</p>
      <nav class="flex-1 space-y-1">
        <RouterLink
          v-for="link in navLinks" :key="link.to" :to="link.to"
          class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition-colors"
          active-class="bg-gray-800 text-white font-medium"
        >
          {{ link.label }}
        </RouterLink>
      </nav>
      <div class="border-t border-gray-700 pt-4">
        <p class="text-xs text-gray-400 px-3 mb-2">{{ auth.user?.name }}</p>
        <button @click="handleLogout" class="w-full text-left px-3 py-2 rounded-lg text-sm text-red-400 hover:bg-gray-800">
          Wyloguj się
        </button>
      </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0">
      <!-- Topbar -->
      <header class="bg-white border-b border-gray-200 px-6 py-4">
        <p class="text-sm text-gray-500">{{ route.name }}</p>
      </header>
      <main class="flex-1 p-6">
        <RouterView />
      </main>
    </div>
  </div>
</template>

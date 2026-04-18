<script setup>
import { RouterLink, RouterView, useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import { useUiStore }   from '@/stores/ui'
import { useToast }     from 'vue-toastification'

const auth   = useAuthStore()
const ui     = useUiStore()
const router = useRouter()
const toast  = useToast()

const navLinks = [
  { to: '/panel/dashboard',   label: 'Dashboard' },
  { to: '/panel/profil',      label: 'Mój profil' },
  { to: '/panel/ulubione',    label: 'Ulubione' },
  { to: '/panel/rezerwacje',  label: 'Rezerwacje' },
  { to: '/panel/wiadomosci',  label: 'Wiadomości' },
]

async function handleLogout() {
  await auth.logout()
  toast.success('Wylogowano.')
  router.push('/')
}
</script>

<template>
  <div class="min-h-screen flex bg-gray-50">
    <!-- Sidebar -->
    <aside class="hidden md:flex flex-col w-64 bg-white border-r border-gray-200 p-4 shrink-0">
      <RouterLink to="/" class="font-bold text-primary-600 text-lg mb-8 block">NajmujMieszkanie</RouterLink>
      <nav class="flex-1 space-y-1">
        <RouterLink
          v-for="link in navLinks" :key="link.to" :to="link.to"
          class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-100 transition-colors"
          active-class="bg-primary-50 text-primary-700 font-medium"
        >
          {{ link.label }}
        </RouterLink>
      </nav>
      <div class="border-t border-gray-200 pt-4 space-y-2">
        <p class="text-xs text-gray-500 px-3">{{ auth.user?.name }}</p>
        <button @click="handleLogout" class="w-full text-left px-3 py-2 rounded-lg text-sm text-red-600 hover:bg-red-50">
          Wyloguj się
        </button>
      </div>
    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col min-w-0">
      <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between md:hidden">
        <RouterLink to="/" class="font-bold text-primary-600">NajmujMieszkanie</RouterLink>
        <button @click="ui.toggleSidebar()" class="p-2 rounded-lg text-gray-500 hover:bg-gray-100">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </header>
      <main class="flex-1 p-6">
        <RouterView />
      </main>
    </div>
  </div>
</template>

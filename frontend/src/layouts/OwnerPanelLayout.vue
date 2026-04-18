<script setup>
import { RouterLink, RouterView, useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import { useToast }     from 'vue-toastification'

const auth   = useAuthStore()
const router = useRouter()
const toast  = useToast()

const navLinks = [
  { to: '/wlasciciel/dashboard',  label: 'Dashboard' },
  { to: '/wlasciciel/oferty',     label: 'Moje oferty' },
  { to: '/wlasciciel/wiadomosci', label: 'Wiadomości' },
  { to: '/wlasciciel/rezerwacje', label: 'Rezerwacje' },
  { to: '/wlasciciel/umowy',      label: 'Umowy' },
  { to: '/wlasciciel/platnosci',  label: 'Płatności' },
]

async function handleLogout() {
  await auth.logout()
  toast.success('Wylogowano.')
  router.push('/')
}
</script>

<template>
  <div class="min-h-screen flex bg-gray-50">
    <aside class="hidden md:flex flex-col w-64 bg-white border-r border-gray-200 p-4 shrink-0">
      <RouterLink to="/" class="font-bold text-primary-600 text-lg mb-2 block">NajmujMieszkanie</RouterLink>
      <p class="text-xs text-gray-500 mb-6 px-1">Panel właściciela</p>
      <nav class="flex-1 space-y-1">
        <RouterLink
          v-for="link in navLinks" :key="link.to" :to="link.to"
          class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-100 transition-colors"
          active-class="bg-primary-50 text-primary-700 font-medium"
        >
          {{ link.label }}
        </RouterLink>
      </nav>
      <div class="border-t border-gray-200 pt-4">
        <RouterLink to="/wlasciciel/oferty/nowa" class="btn btn-primary btn-sm w-full mb-3 justify-center">
          + Dodaj ofertę
        </RouterLink>
        <p class="text-xs text-gray-500 px-3 mb-2">{{ auth.user?.name }}</p>
        <button @click="handleLogout" class="w-full text-left px-3 py-2 rounded-lg text-sm text-red-600 hover:bg-red-50">
          Wyloguj się
        </button>
      </div>
    </aside>
    <div class="flex-1 flex flex-col min-w-0">
      <main class="flex-1 p-6">
        <RouterView />
      </main>
    </div>
  </div>
</template>

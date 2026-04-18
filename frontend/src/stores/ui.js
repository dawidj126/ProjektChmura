import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useUiStore = defineStore('ui', () => {
  const sidebarOpen = ref(false)
  const loading     = ref(false)

  function toggleSidebar() { sidebarOpen.value = !sidebarOpen.value }
  function setLoading(val) { loading.value = val }

  return { sidebarOpen, loading, toggleSidebar, setLoading }
})

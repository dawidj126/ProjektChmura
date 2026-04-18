import { defineStore } from 'pinia'
import { ref, computed } from 'vue'
import { notificationService } from '@/services/notificationService'

export const useNotificationsStore = defineStore('notifications', () => {
  const items = ref([])

  const unreadCount = computed(() => items.value.filter(n => !n.is_read).length)

  async function fetch() {
    const { data } = await notificationService.list()
    items.value = data.data ?? []
  }

  async function markRead(id) {
    await notificationService.read(id)
    const n = items.value.find(n => n.id === id)
    if (n) n.is_read = true
  }

  async function markAllRead() {
    await notificationService.readAll()
    items.value.forEach(n => (n.is_read = true))
  }

  return { items, unreadCount, fetch, markRead, markAllRead }
})

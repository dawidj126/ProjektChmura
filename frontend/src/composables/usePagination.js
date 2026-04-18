import { ref, reactive } from 'vue'

export function usePagination(fetchFn) {
  const items = ref([])
  const meta  = reactive({ current_page: 1, last_page: 1, total: 0, per_page: 15 })
  const loading = ref(false)
  const error   = ref(null)

  async function load(page = 1, params = {}) {
    loading.value = true
    error.value   = null
    try {
      const { data } = await fetchFn({ page, ...params })
      items.value = data.data
      Object.assign(meta, data.meta ?? {})
    } catch (e) {
      error.value = e
    } finally {
      loading.value = false
    }
  }

  function changePage(page) {
    load(page)
  }

  return { items, meta, loading, error, load, changePage }
}

<script setup>
const props = defineProps({
  currentPage: { type: Number, required: true },
  lastPage:    { type: Number, required: true },
  total:       { type: Number, default: 0 },
})

const emit = defineEmits(['change'])

function pages() {
  const range = []
  const delta = 2
  for (let i = Math.max(1, props.currentPage - delta); i <= Math.min(props.lastPage, props.currentPage + delta); i++) {
    range.push(i)
  }
  return range
}
</script>

<template>
  <div v-if="lastPage > 1" class="flex items-center justify-between py-4">
    <p class="text-sm text-gray-500">Łącznie: {{ total }}</p>
    <div class="flex items-center gap-1">
      <button
        :disabled="currentPage === 1"
        @click="emit('change', currentPage - 1)"
        class="px-3 py-1.5 text-sm rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 disabled:opacity-40 disabled:cursor-not-allowed"
      >
        ‹
      </button>
      <button
        v-for="p in pages()" :key="p"
        @click="emit('change', p)"
        :class="['px-3 py-1.5 text-sm rounded-lg border', p === currentPage
          ? 'bg-primary-600 text-white border-primary-600'
          : 'border-gray-300 text-gray-600 hover:bg-gray-50']"
      >
        {{ p }}
      </button>
      <button
        :disabled="currentPage === lastPage"
        @click="emit('change', currentPage + 1)"
        class="px-3 py-1.5 text-sm rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 disabled:opacity-40 disabled:cursor-not-allowed"
      >
        ›
      </button>
    </div>
  </div>
</template>

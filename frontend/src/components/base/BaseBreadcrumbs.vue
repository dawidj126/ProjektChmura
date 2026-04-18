<script setup>
defineProps({
  items: { type: Array, default: () => [] },
})
</script>

<template>
  <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
    <template v-for="(item, i) in items" :key="i">
      <RouterLink v-if="item.to" :to="item.to" class="hover:text-primary-600 transition-colors">
        {{ item.label }}
      </RouterLink>
      <span v-else class="text-gray-900 font-medium">{{ item.label }}</span>
      <span v-if="i < items.length - 1" class="text-gray-300">/</span>
    </template>
  </nav>
</template>

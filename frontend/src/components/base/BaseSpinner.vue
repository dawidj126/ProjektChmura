<script setup>
defineProps({
  size: { type: String, default: 'md' },
})
const sizeClass = { sm: 'w-4 h-4', md: 'w-8 h-8', lg: 'w-12 h-12' }
</script>

<template>
  <div class="flex justify-center items-center p-4">
    <svg :class="['animate-spin text-primary-600', sizeClass[size]]" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
    </svg>
  </div>
</template>

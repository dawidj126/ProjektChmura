<script setup>
defineProps({
  variant: { type: String, default: 'gray' },
})
const variants = {
  green:  'badge-green',
  yellow: 'badge-yellow',
  red:    'badge-red',
  blue:   'badge-blue',
  gray:   'badge-gray',
}
</script>

<template>
  <span :class="variants[variant] ?? 'badge-gray'"><slot /></span>
</template>

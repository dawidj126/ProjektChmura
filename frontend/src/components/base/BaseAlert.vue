<script setup>
defineProps({
  type:    { type: String, default: 'info' },
  message: { type: String, default: '' },
  dismissible: { type: Boolean, default: false },
})

defineEmits(['dismiss'])

const classes = {
  info:    'bg-blue-50 text-blue-800 border-blue-200',
  success: 'bg-green-50 text-green-800 border-green-200',
  warning: 'bg-yellow-50 text-yellow-800 border-yellow-200',
  error:   'bg-red-50 text-red-800 border-red-200',
}
</script>

<template>
  <div :class="['flex items-start gap-3 p-4 rounded-lg border text-sm', classes[type]]">
    <span class="flex-1"><slot>{{ message }}</slot></span>
    <button v-if="dismissible" @click="$emit('dismiss')" class="shrink-0 opacity-60 hover:opacity-100">✕</button>
  </div>
</template>

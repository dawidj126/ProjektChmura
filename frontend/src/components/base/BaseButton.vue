<script setup>
defineProps({
  variant: { type: String, default: 'primary' },
  size:    { type: String, default: 'md' },
  loading: { type: Boolean, default: false },
  disabled:{ type: Boolean, default: false },
  type:    { type: String, default: 'button' },
})

const variantClass = {
  primary:   'btn-primary',
  secondary: 'btn-secondary',
  danger:    'btn-danger',
  ghost:     'btn bg-transparent text-gray-600 hover:bg-gray-100',
}

const sizeClass = {
  sm: 'btn-sm',
  md: '',
  lg: 'btn-lg',
}
</script>

<template>
  <button
    :type="type"
    :disabled="disabled || loading"
    :class="['btn', variantClass[variant], sizeClass[size]]"
  >
    <svg v-if="loading" class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
    </svg>
    <slot />
  </button>
</template>

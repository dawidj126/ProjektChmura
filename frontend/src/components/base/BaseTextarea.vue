<script setup>
defineProps({
  modelValue: { type: String, default: '' },
  label:      { type: String, default: '' },
  placeholder:{ type: String, default: '' },
  rows:       { type: Number, default: 4 },
  error:      { type: String, default: '' },
  required:   { type: Boolean, default: false },
  id:         { type: String, default: () => `textarea-${Math.random().toString(36).slice(2)}` },
})

defineEmits(['update:modelValue'])
</script>

<template>
  <div>
    <label v-if="label" :for="id" class="form-label">
      {{ label }} <span v-if="required" class="text-red-500">*</span>
    </label>
    <textarea
      :id="id"
      :value="modelValue"
      :placeholder="placeholder"
      :rows="rows"
      :required="required"
      :class="['form-input resize-none', error ? 'form-input-error' : '']"
      @input="$emit('update:modelValue', $event.target.value)"
    />
    <p v-if="error" class="form-error">{{ error }}</p>
  </div>
</template>

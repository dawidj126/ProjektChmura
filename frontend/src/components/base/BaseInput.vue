<script setup>
defineProps({
  modelValue: { type: [String, Number], default: '' },
  label:      { type: String, default: '' },
  type:       { type: String, default: 'text' },
  placeholder:{ type: String, default: '' },
  error:      { type: String, default: '' },
  required:   { type: Boolean, default: false },
  disabled:   { type: Boolean, default: false },
  id:         { type: String, default: () => `input-${Math.random().toString(36).slice(2)}` },
})

defineEmits(['update:modelValue'])
</script>

<template>
  <div>
    <label v-if="label" :for="id" class="form-label">
      {{ label }} <span v-if="required" class="text-red-500">*</span>
    </label>
    <input
      :id="id"
      :type="type"
      :value="modelValue"
      :placeholder="placeholder"
      :disabled="disabled"
      :required="required"
      :class="['form-input', error ? 'form-input-error' : '']"
      @input="$emit('update:modelValue', $event.target.value)"
    />
    <p v-if="error" class="form-error">{{ error }}</p>
  </div>
</template>

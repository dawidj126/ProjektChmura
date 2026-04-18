import { ref } from 'vue'

export function useApiErrors() {
  const errors  = ref({})
  const message = ref('')

  function setErrors(error) {
    if (error.response?.status === 422) {
      errors.value  = error.response.data.errors ?? {}
      message.value = error.response.data.message ?? 'Dane są nieprawidłowe.'
    } else {
      message.value = error.response?.data?.message ?? 'Wystąpił błąd. Spróbuj ponownie.'
      errors.value  = {}
    }
  }

  function clearErrors() {
    errors.value  = {}
    message.value = ''
  }

  function fieldError(field) {
    return errors.value[field]?.[0] ?? ''
  }

  return { errors, message, setErrors, clearErrors, fieldError }
}

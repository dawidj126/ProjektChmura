import { format, parseISO } from 'date-fns'
import { pl } from 'date-fns/locale'

export function formatPrice(value) {
  if (!value && value !== 0) return '—'
  return new Intl.NumberFormat('pl-PL', { style: 'currency', currency: 'PLN' }).format(value)
}

export function formatDate(date, pattern = 'd MMM yyyy') {
  if (!date) return '—'
  const d = typeof date === 'string' ? parseISO(date) : date
  return format(d, pattern, { locale: pl })
}

export function formatDateTime(date) {
  return formatDate(date, 'd MMM yyyy, HH:mm')
}

export function formatArea(m2) {
  if (!m2) return '—'
  return `${m2} m²`
}

export function propertyTypeLabel(type) {
  return type === 'apartment' ? 'Mieszkanie' : 'Pokój'
}

export function propertyStatusLabel(status) {
  const map = {
    draft:     'Szkic',
    pending:   'Oczekuje',
    published: 'Opublikowana',
    rejected:  'Odrzucona',
    archived:  'Zarchiwizowana',
  }
  return map[status] ?? status
}

export function propertyStatusVariant(status) {
  const map = {
    draft:     'gray',
    pending:   'yellow',
    published: 'green',
    rejected:  'red',
    archived:  'gray',
  }
  return map[status] ?? 'gray'
}

export function viewingStatusLabel(status) {
  const map = {
    pending:   'Oczekuje',
    accepted:  'Zaakceptowane',
    rejected:  'Odrzucone',
    cancelled: 'Anulowane',
    completed: 'Zakończone',
  }
  return map[status] ?? status
}

export function paymentStatusLabel(status) {
  const map = { pending: 'Oczekuje', paid: 'Opłacone', failed: 'Nieudane', cancelled: 'Anulowane' }
  return map[status] ?? status
}

export function paymentStatusVariant(status) {
  const map = { pending: 'yellow', paid: 'green', failed: 'red', cancelled: 'gray' }
  return map[status] ?? 'gray'
}

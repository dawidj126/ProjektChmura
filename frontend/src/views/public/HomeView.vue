<script setup>
import PublicLayout from '@/layouts/PublicLayout.vue'
import { RouterLink } from 'vue-router'
</script>

<template>
  <PublicLayout>
    <!-- Hero -->
    <section class="bg-gradient-to-br from-primary-600 to-primary-800 text-white py-24">
      <div class="max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Znajdź wymarzone mieszkanie lub pokój</h1>
        <p class="text-xl text-primary-100 mb-10">Tysiące ofert w całej Polsce. Bezpośrednio od właścicieli.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <RouterLink to="/oferty?type=apartment" class="btn bg-white text-primary-700 hover:bg-gray-50 btn-lg font-semibold">
            Szukaj mieszkania
          </RouterLink>
          <RouterLink to="/oferty?type=room" class="btn border-2 border-white text-white hover:bg-primary-700 btn-lg font-semibold">
            Szukaj pokoju
          </RouterLink>
        </div>
      </div>
    </section>

    <!-- CTA właściciel -->
    <section class="bg-gray-50 py-16">
      <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Jesteś właścicielem?</h2>
        <p class="text-gray-600 mb-8">Dodaj ofertę za darmo i znajdź najemcę szybko i bezpiecznie.</p>
        <RouterLink to="/auth/rejestracja" class="btn-primary btn-lg">
          Dodaj ogłoszenie
        </RouterLink>
      </div>
    </section>
  </PublicLayout>
</template>

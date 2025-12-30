<!-- resources/js/Components/Admin/AdminHeader.vue -->
<template>
  <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-40">
    <div class="flex items-center justify-between h-16 px-6">
      <!-- Titre et breadcrumb -->
      <div>
        <h1 class="text-xl font-semibold text-gray-900">{{ title }}</h1>
        <p class="text-sm text-gray-500">{{ description }}</p>
      </div>

      <!-- Actions -->
      <div class="flex items-center space-x-4">
        <!-- Notifications -->
        <button class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors duration-200">
          <BellIcon class="h-5 w-5" />
          <span v-if="stats.contributions_pending > 0" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
            {{ stats.contributions_pending }}
          </span>
        </button>

        <!-- Utilisateur -->
        <div class="flex items-center space-x-3">
          <div class="text-right hidden md:block">
            <p class="text-sm font-medium text-gray-900">Administrateur</p>
            <p class="text-xs text-gray-500">Club IA-ENSPD</p>
          </div>
          <div class="h-10 w-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
            A
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import { BellIcon } from 'lucide-vue-next'

defineProps({
  title: String,
  description: String,
  stats: {
    type: Object,
    default: () => ({ contributions_pending: 0 })
  }
})
</script>

<!-- resources/js/Components/Admin/DashboardCard.vue -->
<template>
  <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <div class="flex items-center justify-between mb-6">
      <h3 class="text-lg font-semibold text-gray-900">{{ title }}</h3>
      <Link
        v-if="actionLabel && actionTo"
        :href="actionTo"
        class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center"
      >
        {{ actionLabel }}
        <ArrowRightIcon class="h-4 w-4 ml-1" />
      </Link>
    </div>
    <slot />
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { ArrowRightIcon } from 'lucide-vue-next'

defineProps({
  title: String,
  actionLabel: String,
  actionTo: String
})
</script>

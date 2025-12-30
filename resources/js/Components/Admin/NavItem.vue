<!-- resources/js/Components/Admin/NavItem.vue -->
<template>
  <Link
    :href="href"
    class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-all duration-200 group"
    :class="{
      'bg-blue-600 text-white': active,
      'pl-8': level > 0
    }"
  >
    <component
      :is="icon"
      class="h-5 w-5 mr-3 flex-shrink-0"
      :class="active ? 'text-white' : 'text-gray-400 group-hover:text-white'"
    />
    <span class="flex-1">{{ label }}</span>
    <span
      v-if="badge"
      class="ml-2 px-2 py-1 text-xs rounded-full min-w-[20px] text-center"
      :class="badgeColor === 'red' ? 'bg-red-500 text-white' : 'bg-blue-500 text-white'"
    >
      {{ badge }}
    </span>
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  href: String,
  icon: Object, // Changed from String to Object for Lucide icons
  label: String,
  active: Boolean,
  badge: [Number, String],
  badgeColor: {
    type: String,
    default: 'blue'
  },
  level: {
    type: Number,
    default: 0
  }
})
</script>

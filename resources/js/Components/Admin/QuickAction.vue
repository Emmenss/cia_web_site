<!-- resources/js/Components/Admin/QuickAction.vue -->
<template>
  <Link
    :href="to"
    class="flex items-center p-4 bg-white border border-gray-200 rounded-lg hover:shadow-md transition-all duration-200 group hover:border-blue-200"
  >
    <div
      class="p-3 rounded-lg mr-4 transition-colors duration-200"
      :class="iconBgColor"
    >
      <component
        :is="icon"
        class="h-5 w-5"
        :class="iconColor"
      />
    </div>
    <div class="flex-1">
      <p class="font-medium text-gray-900">{{ title }}</p>
      <p class="text-sm text-gray-500">Accéder à la fonction</p>
    </div>
    <ArrowRightIcon class="h-4 w-4 text-gray-400 group-hover:text-blue-600 transition-colors duration-200" />
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { ArrowRightIcon } from 'lucide-vue-next'
import { computed } from 'vue'

const props = defineProps({
  title: String,
  icon: Object,
  color: {
    type: String,
    default: 'blue'
  },
  to: {
    type: String,
    default: '#'
  }
})

const colorClasses = {
  blue: {
    icon: 'text-blue-600',
    bg: 'bg-blue-100 group-hover:bg-blue-200'
  },
  green: {
    icon: 'text-green-600',
    bg: 'bg-green-100 group-hover:bg-green-200'
  },
  purple: {
    icon: 'text-purple-600',
    bg: 'bg-purple-100 group-hover:bg-purple-200'
  },
  red: {
    icon: 'text-red-600',
    bg: 'bg-red-100 group-hover:bg-red-200'
  }
}

const iconColor = computed(() => colorClasses[props.color].icon)
const iconBgColor = computed(() => colorClasses[props.color].bg)
</script>

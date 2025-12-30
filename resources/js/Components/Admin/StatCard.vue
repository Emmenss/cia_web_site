<!-- resources/js/Components/Admin/StatCard.vue -->
<template>
  <Link
    :href="to"
    class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-blue-200 transition-all duration-300 group"
  >
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm font-medium text-gray-600 mb-1">{{ title }}</p>
        <p class="text-3xl font-bold" :class="textColor">{{ formattedValue }}</p>
      </div>
      <div
        class="p-3 rounded-xl transition-colors duration-300"
        :class="iconBgColor"
      >
        <component
          :is="icon"
          class="h-6 w-6"
          :class="iconColor"
        />
      </div>
    </div>
    <div class="mt-3 pt-3 border-t border-gray-100">
      <p class="text-xs text-gray-500 flex items-center">
        <TrendingUpIcon class="h-3 w-3 mr-1" />
        <span>Voir les détails</span>
        <ArrowRightIcon class="h-3 w-3 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" />
      </p>
    </div>
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { TrendingUpIcon, ArrowRightIcon } from 'lucide-vue-next'
import { computed } from 'vue'

const props = defineProps({
  title: String,
  value: [Number, String],
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
    text: 'text-blue-600',
    icon: 'text-blue-600',
    bg: 'bg-blue-100 group-hover:bg-blue-200'
  },
  green: {
    text: 'text-green-600',
    icon: 'text-green-600',
    bg: 'bg-green-100 group-hover:bg-green-200'
  },
  purple: {
    text: 'text-purple-600',
    icon: 'text-purple-600',
    bg: 'bg-purple-100 group-hover:bg-purple-200'
  },
  red: {
    text: 'text-red-600',
    icon: 'text-red-600',
    bg: 'bg-red-100 group-hover:bg-red-200'
  }
}

const textColor = computed(() => colorClasses[props.color].text)
const iconColor = computed(() => colorClasses[props.color].icon)
const iconBgColor = computed(() => colorClasses[props.color].bg)

const formattedValue = computed(() => {
  if (typeof props.value === 'number' && props.value > 1000) {
    return Math.floor(props.value / 1000) + 'k'
  }
  return props.value
})
</script>

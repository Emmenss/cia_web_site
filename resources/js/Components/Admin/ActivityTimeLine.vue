<!-- resources/js/Components/Admin/ActivityTimeline.vue -->
<template>
  <div class="space-y-4">
    <div
      v-for="(activity, index) in activities"
      :key="index"
      class="flex items-start space-x-3"
    >
      <div class="flex-shrink-0">
        <div
          class="h-8 w-8 rounded-full flex items-center justify-center"
          :class="activityTypeColors[activity.type]"
        >
          <component
            :is="activityTypeIcons[activity.type]"
            class="h-4 w-4"
          />
        </div>
      </div>
      <div class="flex-1 min-w-0">
        <p class="text-sm font-medium text-gray-900">
          {{ activity.title }}
        </p>
        <p class="text-xs text-gray-500">
          {{ activity.action }} • {{ activity.time }}
        </p>
        <p class="text-xs text-gray-400 mt-1">
          par {{ activity.user }}
        </p>
      </div>
    </div>

    <div v-if="activities.length === 0" class="text-center py-8 text-gray-500">
      <ActivityIcon class="h-12 w-12 mx-auto text-gray-300 mb-3" />
      <p class="text-sm">Aucune activité récente</p>
    </div>
  </div>
</template>

<script setup>
import { ActivityIcon, NewspaperIcon, CalendarIcon, FolderIcon, ShieldIcon } from 'lucide-vue-next'

defineProps({
  activities: {
    type: Array,
    default: () => []
  }
})

const activityTypeIcons = {
  actualite: NewspaperIcon,
  evenement: CalendarIcon,
  projet: FolderIcon,
  contribution: ShieldIcon,
  system: ActivityIcon
}

const activityTypeColors = {
  actualite: 'bg-blue-100 text-blue-600',
  evenement: 'bg-green-100 text-green-600',
  projet: 'bg-purple-100 text-purple-600',
  contribution: 'bg-red-100 text-red-600',
  system: 'bg-gray-100 text-gray-600'
}
</script>

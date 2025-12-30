<!-- resources/js/Components/Admin/ContributionsList.vue -->
<template>
  <div class="space-y-3">
    <div
      v-for="contribution in contributions"
      :key="contribution.id"
      class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200 group"
    >
      <div class="flex-1 min-w-0">
        <div class="flex items-center space-x-3">
          <div
            class="p-2 rounded-lg"
            :class="typeColors[contribution.type]"
          >
            <component
              :is="typeIcons[contribution.type]"
              class="h-4 w-4"
            />
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-medium text-gray-900 truncate">
              {{ contribution.titre }}
            </p>
            <p class="text-xs text-gray-500 flex items-center space-x-2">
              <span>{{ contribution.user }}</span>
              <span>•</span>
              <span>{{ contribution.created_at }}</span>
            </p>
          </div>
        </div>
      </div>
      <Link
        :href="`/admin/contributions/${contribution.id}`"
        class="ml-4 px-3 py-2 bg-white border border-gray-300 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-50 transition-colors duration-200 flex items-center space-x-1"
      >
        <EyeIcon class="h-4 w-4" />
        <span>Voir</span>
      </Link>
    </div>

    <div v-if="contributions.length === 0" class="text-center py-8 text-gray-500">
      <InboxIcon class="h-12 w-12 mx-auto text-gray-300 mb-3" />
      <p class="text-sm">Aucune contribution en attente</p>
      <p class="text-xs text-gray-400 mt-1">Toutes les contributions sont traitées</p>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { InboxIcon, EyeIcon, ImageIcon, FileTextIcon, DatabaseIcon } from 'lucide-vue-next'

defineProps({
  contributions: {
    type: Array,
    default: () => []
  }
})

const typeIcons = {
  image: ImageIcon,
  texte: FileTextIcon,
  dataset: DatabaseIcon
}

const typeColors = {
  image: 'bg-blue-100 text-blue-600',
  texte: 'bg-green-100 text-green-600',
  dataset: 'bg-purple-100 text-purple-600'
}
</script>

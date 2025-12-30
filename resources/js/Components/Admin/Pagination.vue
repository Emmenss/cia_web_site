<!-- resources/js/Components/Pagination.vue -->
<template>
  <div v-if="links.length > 3" class="flex justify-center mt-8">
    <nav class="flex items-center space-x-1">
      <template v-for="(link, index) in links" :key="index">
        <span v-if="link.url === null && !['&laquo; Previous', 'Next &raquo;'].includes(link.label)"
              class="px-3 py-2 text-gray-400 text-sm border border-gray-300 rounded-md">
          {{ link.label.replace('&laquo;', '«').replace('&raquo;', '»') }}
        </span>

        <Link v-else-if="link.label === '&laquo; Previous'"
              :href="link.url"
              class="px-3 py-2 text-gray-700 text-sm border border-gray-300 rounded-md hover:bg-gray-50 flex items-center"
              :class="{ 'opacity-50 cursor-not-allowed': !link.url }"
              :disabled="!link.url">
          <ArrowLeftIcon class="h-4 w-4 mr-1" />
          Précédent
        </Link>

        <Link v-else-if="link.label === 'Next &raquo;'"
              :href="link.url"
              class="px-3 py-2 text-gray-700 text-sm border border-gray-300 rounded-md hover:bg-gray-50 flex items-center"
              :class="{ 'opacity-50 cursor-not-allowed': !link.url }"
              :disabled="!link.url">
          Suivant
          <ArrowRightIcon class="h-4 w-4 ml-1" />
        </Link>

        <Link v-else-if="link.url"
              :href="link.url"
              class="px-3 py-2 text-sm border rounded-md transition-colors"
              :class="link.active
                ? 'bg-blue-600 text-white border-blue-600'
                : 'text-gray-700 border-gray-300 hover:bg-gray-50'">
          {{ link.label }}
        </Link>
      </template>
    </nav>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { ArrowLeftIcon, ArrowRightIcon } from '@heroicons/vue/24/outline'

defineProps({
  links: Array
})
</script>

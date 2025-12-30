<!-- resources/js/Components/Admin/ConfirmationModal.vue -->
<template>
  <div v-if="show" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
      <div class="text-center">
        <!-- Icon -->
        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
          <span class="text-xl text-red-600">❌</span>
        </div>

        <!-- Message -->
        <h3 class="text-lg font-medium text-gray-900 mt-4">
          {{ title }}
        </h3>
        <p class="text-sm text-gray-500 mt-2">
          {{ message }}
        </p>

        <!-- Additional info if needed -->
        <div v-if="itemInfo" class="mt-4 p-3 bg-gray-50 rounded-lg text-left">
          <p class="text-sm font-medium text-gray-900">{{ itemInfo }}</p>
        </div>

        <!-- Actions -->
        <div class="flex justify-center space-x-4 mt-6">
          <button @click="$emit('cancel')"
                  class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
            Non, annuler
          </button>
          <button @click="$emit('confirm')"
                  class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
            Oui, supprimer
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  show: Boolean,
  title: {
    type: String,
    default: 'Supprimer'
  },
  message: {
    type: String,
    default: 'Êtes-vous sûr de vouloir supprimer cet élément ?'
  },
  itemInfo: String
})

defineEmits(['confirm', 'cancel'])
</script>

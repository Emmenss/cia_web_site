<!-- resources/js/Components/Admin/SimpleConfirmationModal.vue -->
<template>
  <div v-if="show" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
      <div class="p-6">
        <!-- Icône -->
        <div class="flex justify-center mb-4">
          <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
            <span class="text-red-600 text-xl">⚠️</span>
          </div>
        </div>

        <!-- Message -->
        <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">{{ title }}</h3>
        <p class="text-gray-600 text-center">{{ message }}</p>

        <!-- Actions -->
        <div class="flex justify-center space-x-4 mt-6">
          <button
            @click="$emit('cancel')"
            class="px-4 py-2 text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors"
          >
            Non, annuler
          </button>
          <button
            @click="$emit('confirm')"
            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors"
          >
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
    default: 'Confirmation de suppression'
  },
  message: {
    type: String,
    default: 'Êtes-vous sûr de vouloir supprimer cet élément ?'
  }
})

defineEmits(['confirm', 'cancel'])
</script>

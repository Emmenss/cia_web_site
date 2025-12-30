<!-- resources/js/Components/Admin/Contributions/ConfirmationModal.vue -->
<template>
  <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
      <div class="text-center">
        <!-- Icon -->
        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full"
             :class="action === 'approuver' ? 'bg-green-100' : 'bg-red-100'">
          <span class="text-xl" :class="action === 'approuver' ? 'text-green-600' : 'text-red-600'">
            {{ action === 'approuver' ? '✅' : '❌' }}
          </span>
        </div>

        <!-- Message -->
        <h3 class="text-lg font-medium text-gray-900 mt-4">
          {{ action === 'approuver' ? 'Approuver la contribution' : 'Rejeter la contribution' }}
        </h3>
        <p class="text-sm text-gray-500 mt-2">
          Êtes-vous sûr de vouloir {{ action === 'approuver' ? 'approuver' : 'rejeter' }} cette contribution ?
        </p>


        <!-- Actions -->
        <div class="flex justify-center space-x-4 mt-6">
          <button @click="$emit('cancel')"
                  class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
            Non, annuler
          </button>
          <button @click="$emit('confirm')"
                  class="px-4 py-2 text-white rounded"
                  :class="action === 'approuver' ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700'">
            Oui, confirmer
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  action: {
    type: String,
    required: true,
    validator: value => ['approuver', 'rejeter'].includes(value)
  },
  contribution: {
    type: Object,
    required: true
  }
})

defineEmits(['confirm', 'cancel'])
</script>

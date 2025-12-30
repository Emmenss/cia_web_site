<!-- resources/js/Components/Admin/Contributions/TextViewModal.vue -->
<template>
  <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-2/3 shadow-lg rounded-md bg-white">
      <!-- Header -->
      <div class="flex justify-between items-center pb-4 border-b">
        <h3 class="text-xl font-semibold text-gray-900">
          📝 Contenu texte
        </h3>
        <button @click="$emit('close')" class="text-gray-400 hover:text-gray-600">
          ✕
        </button>
      </div>

      <!-- Content -->
      <div class="mt-4 max-h-96 overflow-y-auto">
        <div class="bg-gray-50 p-4 rounded-lg">
          <h4 class="font-semibold text-gray-900 mb-2">{{ contribution.titre }}</h4>
          <p class="text-gray-700 whitespace-pre-wrap">{{ contribution.contenu_texte }}</p>
        </div>

        <!-- Metadata -->
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
          <div v-if="contribution.thematique">
            <span class="font-semibold">Thématique:</span> {{ contribution.thematique }}
          </div>
          <div v-if="contribution.langue">
            <span class="font-semibold">Langue:</span> {{ contribution.langue }}
          </div>
          <div v-if="contribution.nature">
            <span class="font-semibold">Nature:</span> {{ contribution.nature }}
          </div>
        </div>
      </div>

      <!-- Actions -->
      <div class="flex justify-end space-x-3 pt-4 mt-4 border-t">
        <button @click="copyText" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
          📋 Copier
        </button>
        <button @click="exportToWord" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            📄 Exporter Word
        </button>
        <button @click="$emit('close')" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
          Fermer
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

defineProps({
  contribution: {
    type: Object,
    required: true
  }
})

const emit = defineEmits(['close'])

function copyText() {
  navigator.clipboard.writeText(props.contribution.contenu_texte)
    .then(() => {
      alert('Texte copié dans le presse-papier !')
    })
    .catch(err => {
      console.error('Erreur lors de la copie:', err)
    })
}

function exportToWord() {
  const content = `
    <html>
      <head>
        <meta charset="UTF-8">
        <title>${props.contribution.titre}</title>
      </head>
      <body>
        <h1>${props.contribution.titre}</h1>
        <p>${props.contribution.contenu_texte}</p>
      </body>
    </html>
  `

  const blob = new Blob([content], { type: 'application/msword' })
  const link = document.createElement('a')
  link.href = URL.createObjectURL(blob)
  link.download = `${props.contribution.titre}.doc`
  link.click()
  URL.revokeObjectURL(link.href)
}
</script>

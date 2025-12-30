<!-- resources/js/Pages/Admin/Contributions/Show.vue -->
<template>
  <AdminLayout
    :title="contribution.titre"
    :description="`Détails de la contribution - ${typeLabels[contribution.type]}`"
  >
    <div class="max-w-6xl mx-auto space-y-6">
      <!-- Header avec bouton retour -->
      <div class="flex justify-between items-center bg-white p-6 rounded-lg shadow border border-gray-200">
        <div>
          <Link href="/admin/contributions" class="flex items-center text-blue-600 hover:text-blue-800 mb-2">
            <ArrowLeftIcon class="h-5 w-5 mr-2" />
            Retour à la liste
          </Link>
          <h1 class="text-3xl font-bold text-gray-900">{{ contribution.titre }}</h1>
          <p class="text-gray-600 mt-1">Soumis le {{ formatDate(contribution.created_at) }}</p>
        </div>
        <div class="flex space-x-3">
          <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium"
                :class="statusColors[contribution.statut]">
            {{ statusLabels[contribution.statut] }}
          </span>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Sidebar d'informations -->
        <div class="lg:col-span-1 space-y-6">
          <!-- Informations de base -->
          <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
              <InformationCircleIcon class="h-5 w-5 mr-2 text-blue-500" />
              Informations générales
            </h2>
            <div class="space-y-3 text-sm">
              <div class="flex justify-between">
                <span class="font-semibold text-gray-600">Type:</span>
                <span :class="typeColors[contribution.type] + ' px-2 py-1 rounded-full text-xs'">
                  {{ typeLabels[contribution.type] }}
                </span>
              </div>
              <div class="flex justify-between">
                <span class="font-semibold text-gray-600">Soumis par:</span>
                <span class="text-gray-900">{{ contribution.user?.name || 'Anonyme' }}</span>
              </div>
              <div class="flex justify-between">
                <span class="font-semibold text-gray-600">Date:</span>
                <span class="text-gray-900">{{ formatDate(contribution.created_at) }}</span>
              </div>
              <div class="flex justify-between">
                <span class="font-semibold text-gray-600">Statut:</span>
                <span :class="statusColors[contribution.statut] + ' px-2 py-1 rounded-full text-xs'">
                  {{ statusLabels[contribution.statut] }}
                </span>
              </div>
            </div>
          </div>

          <!-- Actions de modération -->
          <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
              <CogIcon class="h-5 w-5 mr-2 text-blue-500" />
              Actions
            </h2>
            <div class="space-y-3">
              <button v-if="contribution.statut === 'en_attente'"
                      @click="openConfirmation('approuver', contribution)"
                      class="w-full flex items-center justify-center px-4 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 font-semibold transition-colors">
                <CheckIcon class="h-5 w-5 mr-2" />
                Approuver
              </button>

              <button v-if="contribution.statut === 'en_attente'"
                      @click="openConfirmation('rejeter', contribution)"
                      class="w-full flex items-center justify-center px-4 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 font-semibold transition-colors">
                <XIcon class="h-5 w-5 mr-2" />
                Rejeter
              </button>

              <!-- Téléchargement toujours visible pour images/datasets -->
              <button v-if="['image', 'dataset'].includes(contribution.type)"
                      @click="downloadFile(contribution)"
                      class="w-full flex items-center justify-center px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold transition-colors">
                <DownloadIcon class="h-5 w-5 mr-2" />
                Télécharger
              </button>

              <!-- Actions pour texte -->
              <div v-if="contribution.type === 'texte'" class="space-y-2">
                <button @click="copyText"
                        class="w-full flex items-center justify-center px-4 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold transition-colors">
                  <ClipboardIcon class="h-5 w-5 mr-2" />
                  Copier le texte
                </button>

                <button @click="exportToWord"
                        class="w-full flex items-center justify-center px-4 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 font-semibold transition-colors">
                  <DocumentTextIcon class="h-5 w-5 mr-2" />
                  Exporter en Word
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Contenu principal -->
        <div class="lg:col-span-2 space-y-6">
          <!-- Contenu spécifique -->
          <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
              <EyeIcon class="h-5 w-5 mr-2 text-blue-500" />
              Contenu détaillé
            </h2>

            <div v-if="contribution.type === 'texte'">
              <div class="bg-gray-50 p-4 rounded-lg mb-4">
                <h3 class="font-semibold text-gray-800 mb-3 text-lg">{{ contribution.titre }}</h3>
                <div class="prose max-w-none">
                  <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">{{ contribution.contenu_texte }}</p>
                </div>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div v-if="contribution.thematique" class="bg-blue-50 p-3 rounded-lg">
                  <span class="font-semibold text-blue-700">Thématique:</span>
                  <p class="text-blue-900 mt-1">{{ contribution.thematique }}</p>
                </div>
                <div v-if="contribution.langue" class="bg-green-50 p-3 rounded-lg">
                  <span class="font-semibold text-green-700">Langue:</span>
                  <p class="text-green-900 mt-1">{{ contribution.langue }}</p>
                </div>
              </div>
            </div>

            <div v-else-if="contribution.type === 'image'">
              <div class="grid grid-cols-1 gap-4">
                <div v-if="contribution.nature" class="bg-blue-50 p-4 rounded-lg">
                  <span class="font-semibold text-blue-700">Nature:</span>
                  <p class="text-blue-900 mt-1">{{ contribution.nature }}</p>
                </div>
                <div v-if="contribution.description" class="bg-gray-50 p-4 rounded-lg">
                  <span class="font-semibold text-gray-700">Description:</span>
                  <p class="text-gray-900 mt-1">{{ contribution.description }}</p>
                </div>
                <div v-if="contribution.nom_fichier" class="bg-green-50 p-4 rounded-lg">
                  <span class="font-semibold text-green-700">Fichiers:</span>
                  <p class="text-green-900 mt-1">{{ contribution.nom_fichier }}</p>
                </div>
              </div>
            </div>

            <div v-else-if="contribution.type === 'dataset'">
              <div class="grid grid-cols-1 gap-4">
                <div v-if="contribution.domaine" class="bg-purple-50 p-4 rounded-lg">
                  <span class="font-semibold text-purple-700">Domaine:</span>
                  <p class="text-purple-900 mt-1">{{ contribution.domaine }}</p>
                </div>
                <div v-if="contribution.description" class="bg-gray-50 p-4 rounded-lg">
                  <span class="font-semibold text-gray-700">Description:</span>
                  <p class="text-gray-900 mt-1">{{ contribution.description }}</p>
                </div>
                <div v-if="contribution.nom_fichier" class="bg-green-50 p-4 rounded-lg">
                  <span class="font-semibold text-green-700">Fichier:</span>
                  <p class="text-green-900 mt-1">{{ contribution.nom_fichier }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal de confirmation -->
      <ConfirmationModal
        v-if="showConfirmation"
        :action="confirmationAction"
        :contribution="contributionToModerate"
        @confirm="handleModeration"
        @cancel="showConfirmation = false"
      />
    </div>
  </AdminLayout>
</template>

<script setup>
import { ref } from 'vue'
import { router, Link } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import ConfirmationModal from '@/Components/Admin/Contributions/ConfirmationModal.vue'
import {
  ArrowLeftIcon,
  InfoIcon,
  SettingsIcon,
  CheckIcon,
  XIcon,
  EyeIcon,
  DownloadIcon,
  ClipboardIcon,
  FileTextIcon
} from 'lucide-vue-next' // ← Utilisez lucide-vue-next

const props = defineProps({
  contribution: Object
})

const showConfirmation = ref(false)
const confirmationAction = ref('')
const contributionToModerate = ref(null)

const typeLabels = {
  image: '🖼️ Image',
  texte: '📝 Texte',
  dataset: '📊 Dataset'
}

const statusLabels = {
  en_attente: '⏳ En attente',
  approuve: '✅ Approuvé',
  rejete: '❌ Rejeté'
}

const typeColors = {
  image: 'bg-blue-100 text-blue-800',
  texte: 'bg-green-100 text-green-800',
  dataset: 'bg-purple-100 text-purple-800'
}

const statusColors = {
  en_attente: 'bg-yellow-100 text-yellow-800',
  approuve: 'bg-green-100 text-green-800',
  rejete: 'bg-red-100 text-red-800'
}

function openConfirmation(action, contribution) {
  confirmationAction.value = action
  contributionToModerate.value = contribution
  showConfirmation.value = true
}

function handleModeration() {
  const action = confirmationAction.value
  const contributionId = contributionToModerate.value.id

  if (action === 'approuver') {
    router.post(`/admin/contributions/${contributionId}/approve`)
  } else {
    router.post(`/admin/contributions/${contributionId}/reject`)
  }

  showConfirmation.value = false
  router.reload()
}

function downloadFile(contribution) {
  window.open(`/admin/contributions/${contribution.id}/download`, '_blank')
}

function copyText() {
  navigator.clipboard.writeText(props.contribution.contenu_texte)
    .then(() => {
      alert('✅ Texte copié dans le presse-papier !')
    })
    .catch(err => {
      console.error('Erreur lors de la copie:', err)
      alert('❌ Erreur lors de la copie')
    })
}

function exportToWord() {
  const content = `
    <html xmlns:o="urn:schemas-microsoft-com:office:office"
          xmlns:w="urn:schemas-microsoft-com:office:word"
          xmlns="http://www.w3.org/TR/REC-html40">
      <head>
        <meta charset="UTF-8">
        <title>${props.contribution.titre}</title>
        <style>
          body { font-family: Arial, sans-serif; line-height: 1.6; margin: 2cm; }
          h1 { color: #2c5282; }
          p { margin-bottom: 1em; }
        </style>
      </head>
      <body>
        <h1>${props.contribution.titre}</h1>
        <div>${props.contribution.contenu_texte.replace(/\n/g, '</div><div>')}</div>
      </body>
    </html>
  `

  const blob = new Blob([content], { type: 'application/msword' })
  const link = document.createElement('a')
  link.href = URL.createObjectURL(blob)
  link.download = `${props.contribution.titre.replace(/[^a-z0-9]/gi, '_')}.doc`
  document.body.appendChild(link)
  link.click()
  document.body.removeChild(link)
  URL.revokeObjectURL(link.href)
}

function formatDate(dateString) {
  return new Date(dateString).toLocaleDateString('fr-FR', {
    day: '2-digit',
    month: '2-digit',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  })
}
</script>

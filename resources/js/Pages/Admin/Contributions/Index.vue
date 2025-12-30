<!-- resources/js/Pages/Admin/Contributions/Index.vue -->
<template>
  <AdminLayout
    title="Modération des contributions"
    description="Gérez et modérez les contributions soumises"
  >
    <div class="space-y-6">
      <!-- En-tête avec statistiques -->
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Contributions</h1>
          <p class="text-gray-600">{{ contributions.total }} contribution(s) au total</p>
        </div>
        <div class="flex flex-wrap gap-2">
          <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">
            ⏳ En attente: {{ pendingCount }}
          </span>
          <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
            ✅ Approuvées: {{ approvedCount }}
          </span>
          <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm">
            ❌ Rejetées: {{ rejectedCount }}
          </span>
        </div>
      </div>

      <!-- Filtres -->
      <div class="bg-white p-4 rounded-lg shadow border border-gray-200">
        <div class="flex flex-wrap gap-4 items-center">
          <select v-model="filters.type" class="border border-gray-300 rounded px-3 py-2 text-sm">
            <option value="">Tous les types</option>
            <option value="image">Images</option>
            <option value="texte">Textes</option>
            <option value="dataset">Datasets</option>
          </select>

          <select v-model="filters.statut" class="border border-gray-300 rounded px-3 py-2 text-sm">
            <option value="">Tous les statuts</option>
            <option value="en_attente">En attente</option>
            <option value="approuve">Approuvé</option>
            <option value="rejete">Rejeté</option>
          </select>

          <button @click="resetFilters" class="text-blue-600 hover:text-blue-800 text-sm">
            ↺ Réinitialiser
          </button>
        </div>
      </div>

      <!-- Tableau des contributions -->
      <div class="bg-white rounded-lg shadow border border-gray-200 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Soumis par</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="(contribution, index) in filteredContributions" :key="index" class="hover:bg-gray-50">
              <td class="px-4 py-4 whitespace-nowrap">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                      :class="typeColors[contribution.type]">
                  {{ typeLabels[contribution.type] }}
                </span>
              </td>
              <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900 max-w-xs truncate">
                {{ contribution.titre }}
              </td>
              <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ contribution.user || 'Anonyme' }}
              </td>
              <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ formatDate(contribution.created_at) }}
              </td>
              <td class="px-4 py-4 whitespace-nowrap">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                      :class="statusColors[contribution.statut]">
                  {{ statusLabels[contribution.statut] }}
                </span>
              </td>
              <td class="px-4 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                <!-- CORRECTION ICI : Utilisez l'URL directe au lieu de route() -->
                <a :href="`/admin/contributions/${contribution.id}`"
   class="text-blue-600 hover:text-blue-900 px-2 py-1 rounded hover:bg-blue-50 cursor-pointer">
  👀 Voir
</a>
                <button v-if="contribution.statut === 'en_attente'"
                        @click="openConfirmation('approuver', contribution)"
                        class="text-green-600 hover:text-green-900 px-2 py-1 rounded hover:bg-green-50">
                  ✅ Approuver
                </button>
                <button v-if="contribution.statut === 'en_attente'"
                        @click="openConfirmation('rejeter', contribution)"
                        class="text-red-600 hover:text-red-900 px-2 py-1 rounded hover:bg-red-50">
                  ❌ Rejeter
                </button>
              </td>
            </tr>
          </tbody>
        </table>

        <div v-if="filteredContributions.length === 0" class="text-center py-12 text-gray-500">
          <p>Aucune contribution trouvée</p>
        </div>
      </div>

      <!-- Pagination simplifié -->
     <Pagination :links="contributions.links" />

      <!-- Modals -->
      <TextViewModal
        v-if="selectedContribution && selectedContribution.type === 'texte'"
        :contribution="selectedContribution"
        @close="selectedContribution = null"
      />

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
import { ref, computed, watch } from 'vue'
import { router, Link } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import TextViewModal from '@/Components/Admin/Contributions/TextViewModal.vue'
import ConfirmationModal from '@/Components/Admin/Contributions/ConfirmationModal.vue'


const props = defineProps({
  contributions: Object,
  filters: Object
})

const filters = ref({
  type: props.filters?.type || '',
  statut: props.filters?.statut || ''
})

const selectedContribution = ref(null)
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

const pendingCount = computed(() =>
  props.contributions.data.filter(c => c.statut === 'en_attente').length
)

const approvedCount = computed(() =>
  props.contributions.data.filter(c => c.statut === 'approuve').length
)

const rejectedCount = computed(() =>
  props.contributions.data.filter(c => c.statut === 'rejete').length
)

const filteredContributions = computed(() => {
  return props.contributions.data.filter(contribution => {
    let matches = true

    if (filters.value.type && contribution.type !== filters.value.type) {
      matches = false
    }

    if (filters.value.statut && contribution.statut !== filters.value.statut) {
      matches = false
    }

    return matches
  })
})

function viewContribution(contribution) {
  selectedContribution.value = contribution
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
}

function resetFilters() {
  filters.value = { type: '', statut: '' }
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

// Watch filters changes and reload page
watch(filters, (newFilters) => {
  router.get('/admin/contributions', newFilters, {
    preserveState: true,
    replace: true
  })
})
</script>

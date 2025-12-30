<!-- resources/js/Pages/Admin/Actualites/Index.vue -->
<template>
  <AdminLayout
    title="Gestion des Actualités"
    description="Créez et gérez les actualités du site"
  >
    <div class="space-y-6">
      <!-- Header -->
      <div class="flex justify-between items-center">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Actualités</h1>
          <p class="text-gray-600">{{ filteredActualites.length }} actualité(s)</p>
        </div>
        <Link href="/admin/actualites/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
          + Nouvelle actualité
        </Link>
      </div>

      <!-- Table -->
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Titre</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catégorie</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-for="actualite in filteredActualites" :key="actualite.id">
              <td class="px-6 py-4">{{ actualite.titre || 'Sans titre' }}</td>
              <td class="px-6 py-4">{{ actualite.categorie || 'Non catégorisé' }}</td>
              <td class="px-6 py-4">{{ formatDate(actualite.date_publication) }}</td>
              <td class="px-6 py-4">
                <span :class="actualite.est_publie ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
                      class="px-2 py-1 rounded-full text-xs">
                  {{ actualite.est_publie ? 'Publié' : 'Brouillon' }}
                </span>
              </td>
              <td class="px-6 py-4 space-x-2">
                <Link v-if="actualite.id" :href="`/admin/actualites/${actualite.id}/edit`" class="text-blue-600 hover:text-blue-900">
                  Modifier
                </Link>
                <button v-if="actualite.id" @click="deleteActualite(actualite.id)" class="text-red-600 hover:text-red-900">
                  Supprimer
                </button>
                <span v-else class="text-gray-400">Actions indisponibles</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Message si vide -->
      <div v-if="filteredActualites.length === 0" class="text-center py-12 text-gray-500">
        <p>Aucune actualité trouvée</p>
        <Link href="/admin/actualites/create" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">
          Créer votre première actualité
        </Link>
      </div>

      <!-- Message d'erreur si données corrompues -->
      <div v-if="hasCorruptedData" class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
        <p class="text-yellow-800">
          ⚠️ Certaines actualités comportent des données incomplètes et ne sont pas affichées.
        </p>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
import { computed } from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const props = defineProps({
  actualites: {
    type: Array,
    default: () => []
  }
})

// Filtre les actualités valides
const filteredActualites = computed(() => {
  return props.actualites.filter(actualite =>
    actualite !== null &&
    actualite.id !== null &&
    actualite.id !== undefined
  )
})

// Vérifie s'il y a des données corrompues
const hasCorruptedData = computed(() => {
  return props.actualites.length > filteredActualites.value.length
})

function deleteActualite(id) {
  if (confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')) {
    router.delete(`/admin/actualites/${id}`)
  }
}

function formatDate(date) {
  if (!date) return 'Date non définie'
  return new Date(date).toLocaleDateString('fr-FR')
}
</script>

<!-- resources/js/Pages/Admin/Projets/Index.vue -->
<template>
  <AdminLayout
    title="Gestion des Projets"
    description="Créez et gérez les projets du club"
  >
    <div class="space-y-6">
      <!-- Header -->
      <div class="flex justify-between items-center">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Projets</h1>
          <p class="text-gray-600">{{ projets.length }} projet(s)</p>
        </div>
        <Link href="/admin/projets/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
          + Nouveau projet
        </Link>
      </div>

      <!-- Table -->
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Titre</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catégorie</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Équipe</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr v-for="projet in projets" :key="projet.id">
              <td class="px-6 py-4 font-medium text-gray-900">{{ projet.titre }}</td>
              <td class="px-6 py-4">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                      :class="getCategoryColor(projet.categorie)">
                  {{ projet.categorie }}
                </span>
              </td>
              <td class="px-6 py-4">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                      :class="getStatusColor(projet.statut)">
                  {{ projet.statut }}
                </span>
              </td>
              <td class="px-6 py-4 text-sm text-gray-500">{{ projet.equipe || 'Non spécifiée' }}</td>
              <td class="px-6 py-4 space-x-2">
                <Link :href="`/admin/projets/${projet.id}/edit`" class="text-blue-600 hover:text-blue-900">
                  Modifier
                </Link>
                <button @click="confirmDelete(projet)" class="text-red-600 hover:text-red-900">
                  Supprimer
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Message si vide -->
      <div v-if="projets.length === 0" class="text-center py-12 text-gray-500">
        <p>Aucun projet trouvé</p>
        <Link href="/admin/projets/create" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">
          Créer votre premier projet
        </Link>
      </div>
    </div>

    <!-- Confirmation Modal -->
    <ConfirmationModal
      :show="showDeleteModal"
      title="Supprimer le projet"
      message="Êtes-vous sûr de vouloir supprimer ce projet ? Cette action est irréversible."
      @confirm="deleteProjet"
      @cancel="showDeleteModal = false"
    />
  </AdminLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
import { ref } from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import ConfirmationModal from '@/Components/Admin/Projets/ConfirmationModal.vue'

const props = defineProps({
  projets: Array
})

const showDeleteModal = ref(false)
const projetToDelete = ref(null)

const getCategoryColor = (categorie) => {
  const colors = {
    'Recherche': 'bg-purple-100 text-purple-800',
    'Éducation': 'bg-blue-100 text-blue-800',
    'Culturel': 'bg-pink-100 text-pink-800',
    'Santé': 'bg-green-100 text-green-800',
    'Agriculture': 'bg-yellow-100 text-yellow-800',
    'NLP': 'bg-indigo-100 text-indigo-800',
    'Vision par Ordinateur': 'bg-red-100 text-red-800',
    'Robotique': 'bg-gray-100 text-gray-800'
  }
  return colors[categorie] || 'bg-gray-100 text-gray-800'
}

const getStatusColor = (statut) => {
  const colors = {
    'Terminé': 'bg-green-100 text-green-800',
    'En cours': 'bg-blue-100 text-blue-800',
    'Planifié': 'bg-yellow-100 text-yellow-800'
  }
  return colors[statut] || 'bg-gray-100 text-gray-800'
}

const confirmDelete = (projet) => {
  projetToDelete.value = projet
  showDeleteModal.value = true
}

const deleteProjet = () => {
  if (projetToDelete.value) {
    router.delete(`/admin/projets/${projetToDelete.value.id}`)
  }
  showDeleteModal.value = false
  projetToDelete.value = null
}
</script>

<!-- resources/js/Pages/Admin/Evenements/Create.vue -->
<template>
  <AdminLayout
    title="Créer un événement"
    description="Ajoutez un nouvel événement"
  >
    <div class="max-w-4xl mx-auto">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Créer un événement</h1>
        <Link href="/admin/evenements" class="text-gray-600 hover:text-gray-900 flex items-center">
          ← Retour à la liste
        </Link>
      </div>

      <form @submit.prevent="submit" class="bg-white rounded-lg shadow p-6 space-y-6">
        <!-- Titre -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Titre *</label>
          <input v-model="form.titre" type="text" required
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Description -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
          <textarea v-model="form.description" rows="4" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <!-- Date de début -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Date de début *</label>
          <input v-model="form.date_debut" type="datetime-local" required
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Date de fin -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Date de fin (optionnel)</label>
          <input v-model="form.date_fin" type="datetime-local"
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Lieu -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Lieu *</label>
          <input v-model="form.lieu" type="text" required
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Image URL -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">URL de l'image (optionnel)</label>
          <input v-model="form.image_url" type="url" placeholder="https://exemple.com/image.jpg"
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Statut -->
        <div class="flex items-center">
          <input v-model="form.est_actif" type="checkbox"
                 class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
          <label class="ml-2 text-sm text-gray-700">Événement actif</label>
        </div>

        <!-- Boutons -->
        <div class="flex justify-end space-x-4 pt-6 border-t">
          <Link href="/admin/evenements" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50">
            Annuler
          </Link>
          <button type="submit" :disabled="form.processing"
                  class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 disabled:opacity-50">
            {{ form.processing ? 'Création...' : 'Créer l\'événement' }}
          </button>
        </div>
      </form>
    </div>
  </AdminLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link } from '@inertiajs/vue3'

const form = useForm({
  titre: '',
  description: '',
  date_debut: '',
  date_fin: '',
  lieu: '',
  image_url: '',
  est_actif: true
})

const submit = () => {
  form.post('/admin/evenements')
}
</script>

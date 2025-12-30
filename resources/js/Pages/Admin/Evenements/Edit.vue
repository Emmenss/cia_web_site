<!-- resources/js/Pages/Admin/Evenements/Edit.vue -->
<template>
  <AdminLayout
    title="Modifier l'événement"
    description="Modifiez un événement existant"
  >
    <div class="max-w-4xl mx-auto">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Modifier l'événement</h1>
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
          <div v-if="form.errors.titre" class="text-red-600 text-sm mt-1">{{ form.errors.titre }}</div>
        </div>

        <!-- Description -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
          <textarea v-model="form.description" rows="4" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"></textarea>
          <div v-if="form.errors.description" class="text-red-600 text-sm mt-1">{{ form.errors.description }}</div>
        </div>

        <!-- Date de début -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Date de début *</label>
          <input v-model="form.date_debut" type="datetime-local" required
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          <div v-if="form.errors.date_debut" class="text-red-600 text-sm mt-1">{{ form.errors.date_debut }}</div>
        </div>

        <!-- Date de fin -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Date de fin (optionnel)</label>
          <input v-model="form.date_fin" type="datetime-local"
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          <div v-if="form.errors.date_fin" class="text-red-600 text-sm mt-1">{{ form.errors.date_fin }}</div>
        </div>

        <!-- Lieu -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Lieu *</label>
          <input v-model="form.lieu" type="text" required
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          <div v-if="form.errors.lieu" class="text-red-600 text-sm mt-1">{{ form.errors.lieu }}</div>
        </div>

        <!-- Image URL -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">URL de l'image (optionnel)</label>
          <input v-model="form.image_url" type="url" placeholder="https://exemple.com/image.jpg"
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          <div v-if="form.errors.image_url" class="text-red-600 text-sm mt-1">{{ form.errors.image_url }}</div>

          <!-- Aperçu de l'image -->
          <div v-if="form.image_url" class="mt-3">
            <p class="text-sm text-gray-600 mb-2">Aperçu :</p>
            <img :src="form.image_url" :alt="form.titre"
                 class="w-32 h-32 object-cover rounded-lg border border-gray-300">
          </div>
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
            {{ form.processing ? 'Mise à jour...' : 'Modifier l\'événement' }}
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

const props = defineProps({
  evenement: Object
})

const form = useForm({
  titre: props.evenement.titre,
  description: props.evenement.description,
  date_debut: formatDateTimeLocal(props.evenement.date_debut),
  date_fin: props.evenement.date_fin ? formatDateTimeLocal(props.evenement.date_fin) : null,
  lieu: props.evenement.lieu,
  image_url: props.evenement.image_url,
  est_actif: props.evenement.est_actif
})

function formatDateTimeLocal(dateString) {
  const date = new Date(dateString)
  return date.toISOString().slice(0, 16)
}

const submit = () => {
  form.put(`/admin/evenements/${props.evenement.id}`)
}
</script>

<!-- resources/js/Pages/Admin/Projets/Edit.vue -->
<template>
  <AdminLayout
    title="Modifier le projet"
    description="Modifiez les détails du projet"
  >
    <div class="max-w-4xl mx-auto">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">
          Modifier le projet
        </h1>
        <Link href="/admin/projets" class="text-gray-600 hover:text-gray-900">
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

        <!-- Catégorie -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie *</label>
          <select v-model="form.categorie" required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
            <option value="">Sélectionnez une catégorie</option>
            <option v-for="category in categories" :key="category" :value="category">
              {{ category }}
            </option>
          </select>
          <div v-if="form.errors.categorie" class="text-red-600 text-sm mt-1">{{ form.errors.categorie }}</div>
        </div>

        <!-- Statut -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Statut *</label>
          <select v-model="form.statut" required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
            <option value="">Sélectionnez un statut</option>
            <option v-for="statut in statuts" :key="statut" :value="statut">
              {{ statut }}
            </option>
          </select>
          <div v-if="form.errors.statut" class="text-red-600 text-sm mt-1">{{ form.errors.statut }}</div>
        </div>

        <!-- Équipe -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Équipe (optionnel)</label>
          <input v-model="form.equipe" type="text"
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          <div v-if="form.errors.equipe" class="text-red-600 text-sm mt-1">{{ form.errors.equipe }}</div>
        </div>

        <!-- Liens -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Lien démo (optionnel)</label>
            <input v-model="form.lien_demo" type="url" placeholder="https://exemple.com/demo"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Lien GitHub (optionnel)</label>
            <input v-model="form.lien_github" type="url" placeholder="https://github.com/user/repo"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Lien téléchargement (optionnel)</label>
            <input v-model="form.lien_telechargement" type="url" placeholder="https://exemple.com/download"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Lien découvrir (optionnel)</label>
            <input v-model="form.lien_decouvrir" type="url" placeholder="https://exemple.com/discover"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          </div>
        </div>

        <!-- Image -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">URL de l'image (optionnel)</label>
          <input v-model="form.image_url" type="url" placeholder="https://exemple.com/image.jpg"
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          <div v-if="form.errors.image_url" class="text-red-600 text-sm mt-1">{{ form.errors.image_url }}</div>
        </div>

        <!-- Dates -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Date de début (optionnel)</label>
            <input v-model="form.date_debut" type="date"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Date de fin (optionnel)</label>
            <input v-model="form.date_fin" type="date"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          </div>
        </div>

        <!-- Boutons -->
        <div class="flex justify-end space-x-4 pt-6 border-t">
          <Link href="/admin/projets" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50">
            Annuler
          </Link>
          <button type="submit" :disabled="form.processing"
                  class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 disabled:opacity-50">
            {{ form.processing ? 'Mise à jour...' : 'Modifier' }}
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
  categories: Array,
  statuts: Array,
  projet: Object
})

const form = useForm({
  titre: props.projet.titre,
  description: props.projet.description,
  categorie: props.projet.categorie,
  statut: props.projet.statut,
  equipe: props.projet.equipe || '',
  lien_demo: props.projet.lien_demo || '',
  lien_github: props.projet.lien_github || '',
  lien_telechargement: props.projet.lien_telechargement || '',
  lien_decouvrir: props.projet.lien_decouvrir || '',
  image_url: props.projet.image_url || '',
  date_debut: props.projet.date_debut || '',
  date_fin: props.projet.date_fin || ''
})

const submit = () => {
  form.put(`/admin/projets/${props.projet.id}`)
}
</script>

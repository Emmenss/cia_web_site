<!-- resources/js/Pages/Admin/Actualites/Edit.vue -->
<template>
  <AdminLayout
    title="Modifier l'actualité"
    description="Modifiez une actualité existante"
  >
    <div class="max-w-4xl mx-auto">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Modifier l'actualité</h1>
        <Link href="/admin/actualites" class="text-gray-600 hover:text-gray-900 flex items-center">
          <ArrowLeftIcon class="h-4 w-4 mr-1" />
          Retour à la liste
        </Link>
      </div>

      <form @submit.prevent="submit" class="bg-white rounded-lg shadow p-6 space-y-6">
        <!-- Même structure que Create.vue mais avec les valeurs existantes -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Titre *</label>
          <input v-model="form.titre" type="text" required
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
          <div v-if="form.errors.titre" class="text-red-600 text-sm mt-1">{{ form.errors.titre }}</div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Contenu *</label>
          <textarea v-model="form.contenu" rows="6" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
          <div v-if="form.errors.contenu" class="text-red-600 text-sm mt-1">{{ form.errors.contenu }}</div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie *</label>
          <select v-model="form.categorie" required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="">Sélectionnez une catégorie</option>
            <option value="Santé">Santé</option>
            <option value="Agriculture">Agriculture</option>
            <option value="Éducation">Éducation</option>
            <option value="Technologie">Technologie</option>
            <option value="Économie">Économie</option>
            <option value="Environnement">Environnement</option>
            <option value="Autre">Autre</option>
          </select>
          <div v-if="form.errors.categorie" class="text-red-600 text-sm mt-1">{{ form.errors.categorie }}</div>
        </div>

        <!-- Lien externe personnalisé -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Lien "Lire plus" (optionnel)</label>
          <input v-model="form.lien_externe" type="url" placeholder="https://exemple.com/article"
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
          <p class="text-sm text-gray-500 mt-1">Lien personnalisé pour le bouton "Lire plus"</p>
          <div v-if="form.errors.lien_externe" class="text-red-600 text-sm mt-1">{{ form.errors.lien_externe }}</div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">URL de l'image (optionnel)</label>
          <input v-model="form.image_url" type="url" placeholder="https://exemple.com/image.jpg"
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
          <div v-if="form.errors.image_url" class="text-red-600 text-sm mt-1">{{ form.errors.image_url }}</div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Date de publication *</label>
          <input v-model="form.date_publication" type="date" required
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
          <div v-if="form.errors.date_publication" class="text-red-600 text-sm mt-1">{{ form.errors.date_publication }}</div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Auteur (optionnel)</label>
          <input v-model="form.auteur" type="text"
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
          <div v-if="form.errors.auteur" class="text-red-600 text-sm mt-1">{{ form.errors.auteur }}</div>
        </div>

        <div class="flex items-center">
          <input v-model="form.est_publie" type="checkbox"
                 class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
          <label class="ml-2 text-sm text-gray-700">Actualité publiée</label>
        </div>

        <div class="flex justify-end space-x-4 pt-6 border-t">
          <Link href="/admin/actualites" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
            Annuler
          </Link>
          <button type="submit" :disabled="form.processing"
                  class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 disabled:opacity-50 transition-colors">
            {{ form.processing ? 'Mise à jour...' : 'Modifier l\'actualité' }}
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
import { ArrowLeftIcon } from 'lucide-vue-next'

const props = defineProps({
  actualite: Object
})

const form = useForm({
  titre: props.actualite.titre,
  contenu: props.actualite.contenu,
  categorie: props.actualite.categorie,
  image_url: props.actualite.image_url,
  lien_externe: props.actualite.lien_externe, // Lien personnalisé
  date_publication: props.actualite.date_publication.split('T')[0],
  auteur: props.actualite.auteur,
  est_publie: props.actualite.est_publie
})

const submit = () => {
  form.put(`/admin/actualites/${props.actualite.id}`)
}
</script>

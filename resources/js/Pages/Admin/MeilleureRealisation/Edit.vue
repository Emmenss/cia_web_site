<!-- resources/js/Pages/Admin/MeilleureRealisation/Edit.vue -->
<template>
  <AdminLayout
    title="Meilleure Réalisation"
    description="Configurez la réalisation mise en avant sur la page d'accueil"
  >
    <div class="max-w-4xl mx-auto">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">
          Meilleure Réalisation du Semestre
        </h1>
        <Link href="/admin/dashboard" class="text-gray-600 hover:text-gray-900">
          ← Retour au tableau de bord
        </Link>
      </div>

      <!-- Aperçu en temps réel -->
      <div class="bg-gradient-to-br from-gray-900 to-blue-900 rounded-2xl p-6 mb-6 text-white">
        <h3 class="font-semibold mb-3">Aperçu sur le site</h3>
        <div class="bg-white/10 rounded-xl p-4">
          <div class="flex items-center space-x-4">
            <div class="w-24 h-24 rounded-lg bg-white/20 flex items-center justify-center">
              <span v-if="!form.image_url" class="text-3xl">🏆</span>
              <img v-else :src="form.image_url" alt="Preview" class="w-full h-full object-cover rounded-lg">
            </div>
            <div>
              <span class="text-sm bg-green-500 px-2 py-1 rounded">{{ form.categorie || 'Catégorie' }}</span>
              <h4 class="text-xl font-bold mt-2">{{ form.titre || 'Titre de la réalisation' }}</h4>
              <p class="text-white/80 text-sm mt-1">{{ form.description || 'Description de la réalisation...' }}</p>
            </div>
          </div>
        </div>
      </div>

      <form @submit.prevent="submit" class="bg-white rounded-lg shadow p-6 space-y-6">
        <!-- Titre -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Titre *</label>
          <input v-model="form.titre" type="text" required
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                 placeholder="Titre impressionnant de la réalisation">
          <div v-if="form.errors.titre" class="text-red-600 text-sm mt-1">{{ form.errors.titre }}</div>
        </div>

        <!-- Catégorie -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie *</label>
          <select v-model="form.categorie" required
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
            <option value="">Sélectionnez une catégorie</option>
            <option value="Santé & Innovation">Santé & Innovation</option>
            <option value="Agriculture Intelligente">Agriculture Intelligente</option>
            <option value="Éducation & Formation">Éducation & Formation</option>
            <option value="Recherche Avancée">Recherche Avancée</option>
            <option value="Développement Durable">Développement Durable</option>
            <option value="Technologie Emergente">Technologie Emergente</option>
          </select>
          <div v-if="form.errors.categorie" class="text-red-600 text-sm mt-1">{{ form.errors.categorie }}</div>
        </div>

        <!-- Description -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
          <textarea v-model="form.description" rows="4" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                    placeholder="Description détaillée des résultats et impacts de la réalisation..."></textarea>
          <div v-if="form.errors.description" class="text-red-600 text-sm mt-1">{{ form.errors.description }}</div>
        </div>

        <!-- URL de l'image -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">URL de l'image</label>
          <input v-model="form.image_url" type="url"
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                 placeholder="https://exemple.com/image-projet.jpg">
          <div class="text-xs text-gray-500 mt-1">Format paysage recommandé (1200x600px)</div>
        </div>

        <!-- Lien vers le projet -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Lien vers le projet</label>
          <input v-model="form.lien" type="url"
                 class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                 placeholder="https://exemple.com/projet">
          <div class="text-xs text-gray-500 mt-1">Lien vers la page détaillée du projet</div>
        </div>

        <!-- Informations importantes -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
          <div class="flex items-start space-x-3">
            <div class="text-blue-600">💡</div>
            <div>
              <h4 class="font-semibold text-blue-900">Important</h4>
              <p class="text-blue-700 text-sm mt-1">
                Cette réalisation sera affichée en évidence sur la page d'accueil.
                Pensez à mettre à jour cette section chaque semestre pour garder le contenu frais et engageant.
              </p>
            </div>
          </div>
        </div>

        <!-- Boutons -->
        <div class="flex justify-end space-x-4 pt-6 border-t">
          <Link href="/admin/dashboard" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50">
            Annuler
          </Link>
          <button type="submit" :disabled="form.processing"
                  class="px-4- py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 disabled:opacity-50">
            {{ form.processing ? 'Mise à jour...' : 'Mettre à jour' }}
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
  realisation: Object
})

const form = useForm({
  titre: props.realisation?.titre || '',
  categorie: props.realisation?.categorie || '',
  description: props.realisation?.description || '',
  image_url: props.realisation?.image_url || '',
  lien: props.realisation?.lien || ''
})

const submit = () => {
  form.put('/admin/meilleure-realisation')
}
</script>

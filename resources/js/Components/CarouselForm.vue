<!-- resources/js/Pages/Admin/Carousel/Components/CarouselForm.vue -->
<template>
  <div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-900">
        {{ isEdit ? 'Modifier le slide' : 'Créer un slide' }}
      </h1>
      <Link href="/admin/carousel" class="text-gray-600 hover:text-gray-900">
        ← Retour à la liste
      </Link>
    </div>

    <form @submit.prevent="submit" class="bg-white rounded-lg shadow p-6 space-y-6">
      <!-- Aperçu en temps réel -->
      <div class="bg-gray-50 rounded-lg p-4 border-2 border-dashed border-gray-200">
        <h3 class="font-semibold text-gray-700 mb-3">Aperçu du slide</h3>
        <div class="h-40 rounded relative overflow-hidden">
          <div
            class="w-full h-full flex items-center justify-center bg-cover bg-center"
            :style="form.image_url ? { backgroundImage: `url(${form.image_url})` } : { background: 'linear-gradient(to right, #3b82f6, #8b5cf6)' }"
          >
            <div class="text-center text-white bg-black/30 p-4 rounded">
              <h4 class="text-lg font-bold">{{ form.titre || 'Titre du slide' }}</h4>
              <p class="text-sm">{{ form.description || 'Description du slide' }}</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Titre -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Titre *</label>
        <input v-model="form.titre" type="text" required maxlength="100"
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
               placeholder="Titre accrocheur pour le slide">
        <div class="text-xs text-gray-500 mt-1">{{ form.titre.length }}/100 caractères</div>
        <div v-if="form.errors.titre" class="text-red-600 text-sm mt-1">{{ form.errors.titre }}</div>
      </div>

      <!-- Description -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
        <textarea v-model="form.description" rows="3" required maxlength="200"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                  placeholder="Description concise et engageante"></textarea>
        <div class="text-xs text-gray-500 mt-1">{{ form.description.length }}/200 caractères</div>
        <div v-if="form.errors.description" class="text-red-600 text-sm mt-1">{{ form.errors.description }}</div>
      </div>

      <!-- URL de l'image -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">URL de l'image *</label>
        <input v-model="form.image_url" type="url" required
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
               placeholder="https://exemple.com/image.jpg">
        <div class="text-xs text-gray-500 mt-1">L'image doit être au format paysage (16:9 recommandé)</div>
        <div v-if="form.errors.image_url" class="text-red-600 text-sm mt-1">{{ form.errors.image_url }}</div>
      </div>

      <!-- Ordre -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Ordre d'affichage</label>
        <input v-model="form.ordre" type="number" min="0" max="10"
               class="w-32 px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
        <div class="text-xs text-gray-500 mt-1">Les slides sont triés par ordre croissant</div>
      </div>

      <!-- Statut actif -->
      <div class="flex items-center">
        <input v-model="form.est_actif" type="checkbox" id="est_actif"
               class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="est_actif" class="ml-2 text-sm text-gray-700">
          Slide actif (visible sur le site)
        </label>
      </div>

      <!-- Boutons -->
      <div class="flex justify-end space-x-4 pt-6 border-t">
        <Link href="/admin/carousel" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50">
          Annuler
        </Link>
        <button type="submit" :disabled="form.processing"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 disabled:opacity-50">
          {{ form.processing ? (isEdit ? 'Mise à jour...' : 'Création...') : (isEdit ? 'Modifier' : 'Créer') }}
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  slide: Object,
  isEdit: Boolean
})

const form = useForm({
  titre: props.slide?.titre || '',
  description: props.slide?.description || '',
  image_url: props.slide?.image_url || '',
  ordre: props.slide?.ordre || 0,
  est_actif: props.slide?.est_actif ?? true
})

const submit = () => {
  if (props.isEdit) {
    form.put(`/admin/carousel/${props.slide.id}`)
  } else {
    form.post('/admin/carousel')
  }
}
</script>

<!-- resources/js/Pages/Admin/Carousel/Index.vue -->
<template>
  <AdminLayout
    title="Gestion du Carousel"
    description="Configurez les slides de la page d'accueil"
  >
    <div class="space-y-6">
      <!-- Header -->
      <div class="flex justify-between items-center">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Slides du Carousel</h1>
          <p class="text-gray-600">{{ slides.length }} slide(s)</p>
        </div>
        <Link href="/admin/carousel/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
          + Nouveau slide
        </Link>
      </div>

      <!-- Liste des slides -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="slide in slides"
          :key="slide.id"
          class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow"
        >
          <!-- Image preview -->
          <div class="h-48 bg-gray-200 relative">
            <img
              v-if="slide.image_url"
              :src="slide.image_url"
              :alt="slide.titre"
              class="w-full h-full object-cover"
            />
            <div v-else class="w-full h-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
              <span class="text-white text-4xl">🖼️</span>
            </div>
            <div class="absolute top-2 right-2">
              <span class="px-2 py-1 text-xs rounded-full"
                    :class="slide.est_actif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'">
                {{ slide.est_actif ? 'Actif' : 'Inactif' }}
              </span>
            </div>
          </div>

          <!-- Contenu -->
          <div class="p-4">
            <h3 class="font-semibold text-gray-900 mb-2 truncate">{{ slide.titre }}</h3>
            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ slide.description }}</p>

            <div class="flex justify-between items-center">
              <span class="text-xs text-gray-500">Ordre: {{ slide.ordre }}</span>
              <div class="flex space-x-2">
                <Link :href="`/admin/carousel/${slide.id}/edit`"
                      class="text-blue-600 hover:text-blue-900 text-sm px-2 py-1 rounded hover:bg-blue-50">
                  Modifier
                </Link>
                <button @click="confirmDelete(slide)"
                        class="text-red-600 hover:text-red-900 text-sm px-2 py-1 rounded hover:bg-red-50">
                  Supprimer
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Message si vide -->
      <div v-if="slides.length === 0" class="text-center py-12 bg-gray-50 rounded-lg">
        <div class="text-gray-400 mb-4 text-6xl">🎭</div>
        <p class="text-gray-500 mb-2">Aucun slide configuré</p>
        <p class="text-sm text-gray-400 mb-4">Les visiteurs verront un carousel par défaut</p>
        <Link href="/admin/carousel/create" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
          Créer votre premier slide
        </Link>
      </div>
    </div>

    <!-- Modal de confirmation -->
    <SimpleConfirmationModal
      :show="showDeleteModal"
      title="Supprimer le slide"
      :message="deleteMessage"
      @confirm="deleteSlide"
      @cancel="showDeleteModal = false"
    />
  </AdminLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import SimpleConfirmationModal from '@/Components/Admin/SimpleConfirmationModal.vue'

const props = defineProps({
  slides: Array
})

const showDeleteModal = ref(false)
const slideToDelete = ref(null)

const deleteMessage = computed(() => {
  if (!slideToDelete.value) return 'Êtes-vous sûr de vouloir supprimer ce slide ?'
  return `Êtes-vous sûr de vouloir supprimer le slide "${slideToDelete.value.titre}" ?`
})

const confirmDelete = (slide) => {
  slideToDelete.value = slide
  showDeleteModal.value = true
}

const deleteSlide = () => {
  if (slideToDelete.value) {
    router.delete(`/admin/carousel/${slideToDelete.value.id}`, {
      onSuccess: () => {
        showDeleteModal.value = false
        slideToDelete.value = null
      }
    })
  }
}
</script>

<template>
  <!-- Hero Section -->
  <section class="relative py-20 bg-gradient-to-br from-orange-600 to-red-700 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-up">
        Nos Réalisations
      </h1>
      <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 200ms">
        Découvrez les projets innovants et les succès du Club IA-ENSPD
      </p>
    </div>
  </section>

  <!-- Filtres par Catégorie -->
  <section class="py-12 bg-white sticky top-16 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-wrap justify-center gap-4">
        <button v-for="category in categories" :key="category.id"
          @click="activeCategory = category.id"
          :class="[
            'px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105',
            activeCategory === category.id
              ? 'bg-orange-600 text-white shadow-lg'
              : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
          ]">
          {{ category.name }}
        </button>
      </div>
    </div>
  </section>

  <!-- Projets, Recherche et Développement -->
  <section class="py-20 bg-gradient-to-br from-gray-50 to-orange-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">
            Projets, Recherche et Développement
          </span>
        </h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Innovations technologiques et solutions concrètes développées par nos équipes
        </p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div v-for="projet in filteredProjets" :key="projet.id"
          class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition-transform duration-500 group">

          <!-- Image du projet -->
          <div class="h-48 bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center relative">
            <img v-if="projet.image_url" :src="projet.image_url" :alt="projet.titre" class="w-full h-full object-cover">
            <span v-else class="text-5xl">🤖</span>
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <a v-if="projet.lien_demo" :href="projet.lien_demo" target="_blank"
                 class="bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-full font-semibold hover:bg-white/30 transition-colors">
                Voir le projet
              </a>
              <span v-else class="bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-full font-semibold">
                Détails
              </span>
            </div>
          </div>

          <div class="p-6">
            <span class="text-sm font-semibold text-orange-600 uppercase">{{ projet.categorie }}</span>
            <h3 class="text-xl font-bold text-gray-900 mt-2 mb-3">{{ projet.titre }}</h3>
            <p class="text-gray-600 mb-4 line-clamp-3">{{ projet.description }}</p>

            <div class="flex items-center justify-between mb-4">
              <span class="text-sm text-gray-500">{{ projet.equipe }}</span>
              <span class="text-sm font-semibold px-2 py-1 rounded" :class="getStatusClass(projet.statut)">
                {{ projet.statut }}
              </span>
            </div>

            <!-- Liens d'action -->
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
              <a v-if="projet.lien_demo" :href="projet.lien_demo" target="_blank"
                 class="flex-1 bg-orange-600 text-white text-center py-2 px-4 rounded-lg hover:bg-orange-700 transition-colors text-sm">
                🌐 Voir le projet
              </a>
              <a v-if="projet.lien_github" :href="projet.lien_github" target="_blank"
                 class="flex-1 bg-gray-800 text-white text-center py-2 px-4 rounded-lg hover:bg-gray-900 transition-colors text-sm">
                💻 Code source
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Message si aucun projet -->
      <div v-if="filteredProjets.length === 0" class="text-center py-12">
        <div class="bg-white rounded-xl p-8 shadow-lg">
          <div class="text-6xl mb-4">🔍</div>
          <h3 class="text-xl font-semibold text-gray-900 mb-2">Aucun projet trouvé</h3>
          <p class="text-gray-600">Aucun projet ne correspond à cette catégorie</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Science et Éducation -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Science et Éducation
          </span>
        </h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Ressources pédagogiques et formations d'excellence en intelligence artificielle
        </p>
      </div>

      <div class="grid md:grid-cols-2 gap-8">
        <div v-for="ressource in ressourcesEducatives" :key="ressource.id"
          class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-6 shadow-lg">
          <div class="flex items-start mb-4">
            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center text-white mr-4">
              <span class="text-xl">📚</span>
            </div>
            <div>
              <h3 class="text-xl font-bold text-gray-900">{{ ressource.titre }}</h3>
              <p class="text-blue-600">{{ ressource.type }}</p>
            </div>
          </div>
          <p class="text-gray-600 mb-4">{{ ressource.description }}</p>
          <div class="flex items-center justify-between">
            <span class="text-sm text-gray-500">{{ ressource.date }}</span>
            <a v-if="ressource.lien_telechargement" :href="ressource.lien_telechargement"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
              Télécharger
            </a>
            <span v-else class="text-sm text-gray-500">Non disponible</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Créativité, Artistique & Culturelle -->
  <section class="py-20 bg-gradient-to-br from-purple-50 to-pink-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
            Créativité, Artistique & Culturelle
          </span>
        </h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Exploration de l'IA dans les domaines artistiques et culturels africains
        </p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div v-for="projet in projetsCulturels" :key="projet.id"
          class="bg-white rounded-2xl overflow-hidden shadow-lg group">
          <div class="h-56 bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center">
            <span class="text-6xl">🎨</span>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ projet.titre }}</h3>
            <p class="text-gray-600 mb-4">{{ projet.description }}</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-purple-600 font-semibold">{{ projet.domaine }}</span>
              <a v-if="projet.lien_decouvrir" :href="projet.lien_decouvrir"
                 class="text-purple-600 hover:text-purple-700 font-semibold">
                Découvrir →
              </a>
              <span v-else class="text-sm text-gray-500">Bientôt disponible</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Galerie des Récompenses -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-yellow-600 to-orange-600 bg-clip-text text-transparent">
            🏆 Récompenses et Reconnaissances
          </span>
        </h2>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div v-for="recompense in recompenses" :key="recompense.id"
          class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-6 text-center shadow-lg">
          <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="text-2xl text-white">🏆</span>
          </div>
          <h3 class="text-lg font-bold text-gray-900 mb-2">{{ recompense.titre }}</h3>
          <p class="text-sm text-gray-600 mb-2">{{ recompense.competition }}</p>
          <p class="text-yellow-700 font-semibold">{{ recompense.annee }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const { props: pageProps } = usePage()
const activeCategory = ref('all')

const categories = [
  { id: 'all', name: 'Tous' },
  { id: 'Santé', name: 'Santé' },
  { id: 'Agriculture', name: 'Agriculture' },
  { id: 'NLP', name: 'NLP' },
  { id: 'Vision par Ordinateur', name: 'Vision' },
  { id: 'Robotique', name: 'Robotique' },
  { id: 'Éducation', name: 'Éducation' }
]

// Données des projets - à remplacer par les props réelles
const projetsRecherche = pageProps.projetsRecherche || []
const ressourcesEducatives = pageProps.ressourcesEducatives || []
const projetsCulturels = pageProps.projetsCulturels || []
const recompenses = pageProps.recompenses || []

const filteredProjets = computed(() => {
  if (activeCategory.value === 'all') return projetsRecherche
  return projetsRecherche.filter(projet => projet.categorie === activeCategory.value)
})

const getStatusClass = (statut) => {
  switch (statut) {
    case 'Terminé': return 'bg-green-100 text-green-800'
    case 'En cours': return 'bg-blue-100 text-blue-800'
    case 'Planifié': return 'bg-yellow-100 text-yellow-800'
    default: return 'bg-gray-100 text-gray-800'
  }
}
</script>

<style scoped>
.animate-fade-in-up {
  animation: fadeInUp 0.8s ease-out forwards;
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>

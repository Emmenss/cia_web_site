<template>
  <div class="min-h-screen">
    <!-- ==================== -->
    <!-- HERO SECTION REDESIGNÉE -->
    <!-- ==================== -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-slate-900 via-blue-900 to-purple-900">
      <!-- Background animé amélioré -->
      <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-blue-600/20 via-transparent to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 via-purple-600/5 to-pink-600/10 animate-gradient-shift"></div>
      </div>

      <!-- Particules améliorées -->
      <div class="absolute inset-0 opacity-30">
        <div v-for="i in 20" :key="i"
          class="absolute rounded-full bg-gradient-to-r from-blue-400 to-purple-400 animate-float"
          :style="`
            width: ${Math.random() * 8 + 2}px;
            height: ${Math.random() * 8 + 2}px;
            top: ${Math.random() * 100}%;
            left: ${Math.random() * 100}%;
            animation-delay: ${Math.random() * 10}s;
            animation-duration: ${Math.random() * 15 + 10}s;
            opacity: ${Math.random() * 0.6 + 0.2};
          `">
        </div>
      </div>

      <!-- Étoiles -->
      <div class="absolute inset-0">
        <div v-for="i in 30" :key="'star-' + i"
          class="absolute rounded-full bg-white animate-pulse"
          :style="`
            width: ${Math.random() * 2 + 1}px;
            height: ${Math.random() * 2 + 1}px;
            top: ${Math.random() * 100}%;
            left: ${Math.random() * 100}%;
            animation-delay: ${Math.random() * 5}s;
            opacity: ${Math.random() * 0.8 + 0.2};
          `">
        </div>
      </div>

      <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-fade-in-up">
          <!-- Badge d'accueil amélioré -->
          <div class="inline-flex items-center bg-white/10 backdrop-blur-md rounded-full px-6 py-3 mb-8 border border-white/20 shadow-lg">
            <div class="w-3 h-3 bg-emerald-400 rounded-full animate-pulse mr-3 shadow-lg shadow-emerald-400/50"></div>
            <span class="text-sm font-semibold text-white/90">Nouvelle Plateforme • Innovation 2025</span>
          </div>

          <!-- Titre principal amélioré -->
          <div class="mb-8">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-white mb-4 leading-tight">
              <span class="bg-gradient-to-r from-blue-300 via-purple-300 to-pink-300 bg-clip-text text-transparent">
                Club IA
              </span>
              <br>
              <span class="text-xl sm:text-2xl md:text-3xl text-white/80 font-light bg-white/10 backdrop-blur-sm rounded-2xl px-6 py-2 inline-block mt-4">
                ENSPD
              </span>
            </h1>
          </div>

          <!-- Sous-titre amélioré -->
          <p class="text-lg sm:text-xl md:text-2xl text-white/80 mb-12 max-w-3xl mx-auto leading-relaxed font-light">
            L'Excellence Africaine en
            <span class="bg-gradient-to-r from-blue-300 to-purple-300 bg-clip-text text-transparent font-bold">
              Intelligence Artificielle
            </span>
          </p>

          <!-- Statistiques redesignées -->
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 mb-12 max-w-2xl mx-auto">
            <div v-for="stat in statsData" :key="stat.label"
                 class="bg-white/10 backdrop-blur-md rounded-2xl p-4 sm:p-5 border border-white/20 transform hover:scale-105 transition-all duration-300 group cursor-pointer">
              <div class="text-2xl sm:text-3xl font-bold text-white mb-1 group-hover:text-blue-300 transition-colors">
                {{ stat.value }}
              </div>
              <div class="text-xs sm:text-sm text-white/70 font-medium">{{ stat.label }}</div>
            </div>
          </div>

          <!-- Call-to-action amélioré -->
          <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <Link
              href="/espace-etudiant"
              class="group relative bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-2xl font-bold text-base sm:text-lg hover:shadow-2xl transform hover:scale-105 hover:-translate-y-1 transition-all duration-300 overflow-hidden inline-flex items-center justify-center shadow-lg shadow-blue-500/25"
            >
              <span class="relative z-10 flex items-center">
                Commencer l'aventure
                <ArrowRightIcon class="ml-2 h-4 w-4 sm:h-5 sm:w-5 group-hover:translate-x-1 transition-transform" />
              </span>
              <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </Link>

            <a href="#realisations"
               class="group bg-white/10 backdrop-blur-md text-white border-2 border-white/20 px-6 sm:px-8 py-3 sm:py-4 rounded-2xl font-bold text-base sm:text-lg hover:bg-white/20 hover:border-white/40 transform hover:scale-105 hover:-translate-y-1 transition-all duration-300 flex items-center shadow-lg">
              <span>Voir nos réalisations</span>
            </a>
          </div>
        </div>

        <!-- Scroll indicator amélioré -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 animate-bounce">
          <div class="flex flex-col items-center">
            <span class="text-white/60 text-sm mb-2">Scroll</span>
            <div class="w-6 h-10 border-2 border-white/40 rounded-full flex justify-center">
              <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-pulse"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ==================== -->
    <!-- CAROUSEL AMÉLIORÉ -->
    <!-- ==================== -->
    <section class="py-16 sm:py-20 bg-gradient-to-br from-slate-50 to-blue-50/30">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 sm:mb-16">
          <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
              Découvrez Notre Univers
            </span>
          </h2>
          <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
            Explorez les différentes facettes de notre club à travers ces instantanés captivants
          </p>
        </div>

        <div class="rounded-3xl overflow-hidden shadow-2xl relative bg-white">
          <!-- Carousel container -->
          <div class="relative h-[400px] sm:h-[500px] lg:h-[600px] overflow-hidden">
            <!-- Slides -->
            <div v-for="(slide, index) in carouselData"
                 :key="index"
                 class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                 :class="currentSlideIndex === index ? 'opacity-100' : 'opacity-0'">

              <!-- Image de fond -->
              <div class="absolute inset-0 bg-gradient-to-br from-blue-600/90 to-purple-700/90">
                <img v-if="slide.image_url"
                     :src="slide.image_url"
                     :alt="slide.caption"
                     class="w-full h-full object-cover mix-blend-overlay opacity-40" />
              </div>

              <!-- Overlay -->
              <div class="absolute inset-0 bg-black/30"></div>

              <!-- Contenu -->
              <div class="relative z-10 h-full flex items-center justify-center text-center text-white px-4">
                <div class="max-w-4xl mx-auto">
                  <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 drop-shadow-2xl">
                    {{ slide.caption }}
                  </h3>
                  <p class="text-lg sm:text-xl lg:text-2xl opacity-90 mb-8 leading-relaxed">
                    {{ slide.description }}
                  </p>
                  <button class="bg-white/20 backdrop-blur-sm text-white px-6 sm:px-8 py-3 rounded-2xl font-semibold hover:bg-white/30 transition-all duration-300 transform hover:scale-105 border border-white/30">
                    Explorer
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Navigation améliorée -->
          <div v-if="carouselData.length > 1" class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-3 z-20">
            <button
              v-for="(slide, index) in carouselData"
              :key="index"
              @click="setCurrentSlide(index)"
              class="w-3 h-3 rounded-full transition-all duration-300 bg-white/50 hover:bg-white/70"
              :class="currentSlideIndex === index ? 'bg-white w-8' : ''"
            ></button>
          </div>

          <!-- Boutons de navigation améliorés -->
          <button
            v-if="carouselData.length > 1"
            @click="prevSlide"
            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-sm text-white p-3 rounded-2xl hover:bg-white/30 transition-all duration-300 z-20 hover:scale-110 shadow-lg"
            aria-label="Slide précédent"
          >
            <ChevronLeftIcon class="h-5 w-5 sm:h-6 sm:w-6" />
          </button>
          <button
            v-if="carouselData.length > 1"
            @click="nextSlide"
            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-sm text-white p-3 rounded-2xl hover:bg-white/30 transition-all duration-300 z-20 hover:scale-110 shadow-lg"
            aria-label="Slide suivant"
          >
            <ChevronRightIcon class="h-5 w-5 sm:h-6 sm:h-6" />
          </button>
        </div>
      </div>
    </section>

    <!-- ==================== -->
    <!-- MESSAGE DE BIENVENUE AMÉLIORÉ -->
    <!-- ==================== -->
    <section class="py-16 sm:py-20 bg-white">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-3xl mb-6 shadow-lg">
            <span class="text-2xl text-white">👋</span>
          </div>
          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
            <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
              Bienvenue au Club IA ENSPD
            </span>
          </h1>
          <p class="text-lg sm:text-xl text-gray-600 leading-relaxed mb-8 max-w-3xl mx-auto">
            Le club Intelligence Artificielle de l'École Nationale Supérieure Polytechnique de Douala
            vous ouvre les portes de l'innovation et de l'excellence technologique. Notre communauté
            vise à s'étendre à travers le Cameroun et l'Afrique entière.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <Link
              href="/espace-etudiant"
              class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-2xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300 shadow-lg shadow-blue-500/25"
            >
              Nous rejoindre
            </Link>
            <Link
              href="/objectifs"
              class="border-2 border-blue-600 text-blue-600 px-8 py-4 rounded-2xl font-semibold hover:bg-blue-50 transform hover:scale-105 transition-all duration-300"
            >
              En savoir plus
            </Link>
          </div>
        </div>
      </div>
    </section>

    <!-- ==================== -->
    <!-- MEMBRES EXÉCUTIFS AMÉLIORÉS -->
    <!-- ==================== -->
    <section class="py-16 sm:py-20 bg-gradient-to-br from-slate-50 to-blue-50/50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 sm:mb-16">
          <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
              Notre Équipe Dirigeante
            </span>
          </h2>
          <p class="text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto">
            Découvrez les passionnés qui guident notre club vers l'excellence
          </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
          <div
            v-for="(member, index) in executiveMembersData"
            :key="member.name"
            class="bg-white rounded-3xl shadow-xl overflow-hidden group cursor-pointer transform hover:scale-105 hover:-translate-y-2 transition-all duration-500 border border-gray-100"
          >
            <!-- Photo du membre - À remplacer par les vraies images -->
            <div class="relative h-48 sm:h-56 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center overflow-hidden">
              <!-- Placeholder amélioré -->
              <img :src="member.photo_url" :alt="member.name" class="w-full h-full object-cover" />
              <!--div class="text-6xl text-white/90">👤</div-->
              <!-- Overlay au hover -->
              <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300"></div>
            </div>

            <div class="p-6 text-center">
              <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                {{ member.name }}
              </h3>
              <p class="text-blue-600 font-semibold mb-4">{{ member.position }}</p>
              <p class="text-sm text-gray-600 leading-relaxed line-clamp-3">
                {{ member.bio }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ==================== -->
    <!-- MOT DU PRÉSIDENT REDESIGNÉ -->
    <!-- ==================== -->
    <section class="py-16 sm:py-20 bg-gradient-to-br from-slate-900 to-blue-900">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-lg rounded-3xl p-8 sm:p-12 border border-white/10 shadow-2xl transform hover:scale-[1.01] transition-transform duration-500">
          <div class="flex flex-col lg:flex-row items-center lg:items-start gap-8 sm:gap-12">
            <!-- Photo du président -->
            <div class="relative flex-shrink-0">
              <div class="w-32 h-32 sm:w-40 sm:h-40 bg-gradient-to-br from-blue-400 to-purple-500 rounded-3xl flex items-center justify-center shadow-2xl border-4 border-white/20">
                <span class="text-4xl sm:text-5xl text-white">👑</span>
              </div>
              <div class="absolute -bottom-2 -right-2 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                Président
              </div>
            </div>

            <div class="flex-1 text-center lg:text-left">
              <div class="inline-flex items-center bg-white/10 backdrop-blur-sm rounded-2xl px-4 py-2 mb-6">
                <span class="text-white/80 text-sm font-semibold">💡 Message Important</span>
              </div>

              <h2 class="text-2xl sm:text-3xl font-bold text-white mb-6">Mot du Président</h2>

              <blockquote class="text-lg sm:text-xl text-white/90 leading-relaxed mb-8 italic">
                "Porté à la tête de la gestion du club, mon comité exécutif et moi-même nous donnons
                pour mission et devise : <span class="text-blue-300 font-semibold not-italic">Former, Développer, Sensibiliser</span>.
                Ensemble, bâtissons l'avenir de l'intelligence artificielle en Afrique."
              </blockquote>

              <div class="text-right lg:text-left">
                <p class="font-bold text-white text-lg">{{ presidentData.name }}</p>
                <p class="text-blue-300">Président du Club IA-ENSPD</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ==================== -->
    <!-- MEILLEURE RÉALISATION AMÉLIORÉE -->
    <!-- ==================== -->
    <section id="realisations" class="py-16 sm:py-20 bg-gradient-to-br from-gray-50 to-blue-50/30">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 sm:mb-16">
          <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-3xl mb-4 shadow-lg">
            <span class="text-2xl text-white">🏆</span>
          </div>
          <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            Réalisation Phare du Semestre
          </h2>
          <p class="text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto">
            Découvrez le projet qui incarne notre innovation et notre excellence
          </p>
        </div>

        <div class="bg-gradient-to-br from-white to-blue-50/50 rounded-3xl p-6 sm:p-8 shadow-2xl border border-gray-100 transform hover:scale-[1.01] transition-transform duration-500">
          <div class="flex flex-col lg:flex-row gap-8 sm:gap-12 items-center">
            <div class="lg:w-1/2">
              <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                <!-- Image du projet -->
                <div class="aspect-video bg-gradient-to-br from-green-400 to-blue-500 rounded-2xl flex items-center justify-center">
                  <span v-if="!bestAchievementData.image_url" class="text-6xl sm:text-8xl text-white">🤖</span>
                  <img v-else :src="bestAchievementData.image_url" :alt="bestAchievementData.title"
                       class="w-full h-full object-cover" />
                </div>
                <!-- Badge de catégorie -->
                <div class="absolute top-4 left-4 bg-gradient-to-r from-green-500 to-blue-600 text-white text-sm font-bold px-4 py-2 rounded-full shadow-lg">
                  {{ bestAchievementData.category || 'Innovation' }}
                </div>
              </div>
            </div>

            <div class="lg:w-1/2">
              <div class="space-y-6">
                <div>
                  <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">{{ bestAchievementData.title }}</h3>
                  <p class="text-gray-600 leading-relaxed text-lg">{{ bestAchievementData.description }}</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                  <Link
                    :href="bestAchievementData.link || '#'"
                    class="bg-gradient-to-r from-green-500 to-blue-600 text-white px-8 py-4 rounded-2xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center justify-center space-x-2 shadow-lg shadow-green-500/25"
                  >
                    <span>Découvrir le projet</span>
                    <span class="text-lg">→</span>
                  </Link>

                  <button class="border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-2xl font-semibold hover:border-gray-400 hover:bg-gray-50 transform hover:scale-105 transition-all duration-300">
                    Télécharger
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { ref, onMounted, onUnmounted } from 'vue'
import {
  ArrowRightIcon,
  ChevronLeftIcon,
  ChevronRightIcon
} from 'lucide-vue-next'

// Récupérer les données depuis les props
const props = defineProps({
  carouselSlides: Array,
  bestAchievement: Object,
  stats: Array,
  executiveMembers: Array,
  president: Object
})

// Données statiques (fallback si les données dynamiques ne sont pas disponibles)
const defaultStats = [
  { value: '50+', label: 'Projets Innovants' },
  { value: '200+', label: 'Membres Actifs' },
  { value: '15+', label: 'Partenariats' },
  { value: '98%', label: 'Satisfaction' }
]

const defaultExecutiveMembers = [
  {
    name: 'Dr. Jean Dupont',
    position: 'Président',
    bio: 'Expert en Machine Learning avec 8 ans d\'expérience dans le domaine de l\'IA.'
  },
  {
    name: 'Prof. Marie Lambert',
    position: 'Vice-Présidente',
    bio: 'Spécialiste en vision par ordinateur et traitement d\'images médicales.'
  },
  {
    name: 'M. Paul Martin',
    position: 'Secrétaire Général',
    bio: 'Responsable de la coordination des projets et de la communication internationale.'
  },
  {
    name: 'Mme. Sophie Leroy',
    position: 'Trésorière',
    bio: 'Gestionnaire des ressources et financements des projets innovants du club.'
  }
]

const defaultBestAchievement = {
  title: 'Système de Diagnostic Médical Intelligent',
  category: 'Santé & Innovation',
  description: 'Développement d\'une plateforme IA révolutionnaire pour le diagnostic précoce des maladies tropicales. Notre système combine vision par ordinateur et deep learning pour analyser les images médicales avec une précision de 95%.',
  link: '/realisations/projet-medical',
  image_url: null
}

// Utiliser les données dynamiques ou les fallbacks
const carouselData = props.carouselSlides && props.carouselSlides.length > 0
  ? props.carouselSlides
  : [
      {
        caption: 'Bienvenue à ENSPD',
        description: 'Découvrez notre campus et nos installations de pointe dédiées à l\'innovation',
        image_url: null
      },
      {
        caption: 'Salle de Réunion 32BP 2',
        description: 'Notre espace collaboratif équipé des dernières technologies',
        image_url: null
      },
      {
        caption: 'Président du Club',
        description: 'Rencontrez le leadership derrière notre succès',
        image_url: null
      },
      {
        caption: 'Membres du Club',
        description: 'Une communauté passionnée et talentueuse',
        image_url: null
      },
      {
        caption: 'Compétitions IA',
        description: 'Excellence et innovation au service de l\'Afrique',
        image_url: null
      }
    ]

const bestAchievementData = props.bestAchievement || defaultBestAchievement
const statsData = props.stats || defaultStats
const executiveMembersData = props.executiveMembers || defaultExecutiveMembers
const presidentData = props.president || { name: 'Dr. Jean Dupont' }

// Gestion du carousel
const currentSlideIndex = ref(0)
let carouselInterval = null

const setCurrentSlide = (index) => {
  currentSlideIndex.value = index
}

const nextSlide = () => {
  if (carouselData.length > 0) {
    const nextIndex = (currentSlideIndex.value + 1) % carouselData.length
    setCurrentSlide(nextIndex)
  }
}

const prevSlide = () => {
  if (carouselData.length > 0) {
    const prevIndex = (currentSlideIndex.value - 1 + carouselData.length) % carouselData.length
    setCurrentSlide(prevIndex)
  }
}

onMounted(() => {
  if (carouselData.length > 0) {
    carouselInterval = setInterval(nextSlide, 5000)
  }
})

onUnmounted(() => {
  if (carouselInterval) {
    clearInterval(carouselInterval)
  }
})
</script>

<style scoped>
/* Animations améliorées */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes gradientShift {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

@keyframes float {
  0%, 100% {
    transform: translateY(0px) rotate(0deg);
  }
  50% {
    transform: translateY(-20px) rotate(3deg);
  }
}

.animate-fade-in-up {
  animation: fadeInUp 1s ease-out forwards;
}

.animate-gradient-shift {
  background-size: 200% 200%;
  animation: gradientShift 8s ease infinite;
}

.animate-float {
  animation: float 8s ease-in-out infinite;
}

/* Améliorations responsive */
@media (max-width: 640px) {
  .line-clamp-3 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
  }
}

/* Effets de glassmorphisme améliorés */
.backdrop-blur-md {
  backdrop-filter: blur(12px);
}

/* Transition globale pour les interactions */
* {
  transition-property: color, background-color, border-color, transform, box-shadow;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 200ms;
}
</style>

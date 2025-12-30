<template>
  <!-- Hero Section -->
  <section class="relative py-20 bg-gradient-to-br from-blue-600 to-purple-700 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-up">
        Espace Étudiant
      </h1>
      <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 200ms">
        Découvrez les parcours académiques et les opportunités qui s'offrent à vous
      </p>
    </div>
  </section>

  <!-- Cursus Section -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Cursus Science Ingénieur vs Cursus Ingénieur
          </span>
        </h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Deux parcours d'excellence pour former les leaders de demain en intelligence artificielle
        </p>
      </div>

      <div class="grid md:grid-cols-2 gap-12 mb-16">
        <!-- Cursus Science Ingénieur -->
        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-8 shadow-lg transform hover:scale-105 transition-transform duration-300">
          <div class="text-center mb-6">
            <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
              <span class="text-2xl text-white">🔬</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Cursus Science Ingénieur</h3>
            <p class="text-blue-600 font-semibold">Orientation Recherche</p>
          </div>
          <ul class="space-y-3 text-gray-700">
            <li class="flex items-center">
              <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
              <span>2 ans de tronc commun</span>
            </li>
            <li class="flex items-center">
              <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
              <span>Diplôme de Licence Science de l'Ingénieur</span>
            </li>
            <li class="extremely-important flex items-center">
              <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
              <span>Master recherche en Science de l'Ingénieur</span>
            </li>
            <li class="flex items-center">
              <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
              <span>Approche généraliste et recherche</span>
            </li>
          </ul>
        </div>

        <!-- Cursus Ingénieur -->
        <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-8 shadow-lg transform hover:scale-105 transition-transform duration-300">
          <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gray-800 rounded-full extremel flex items-center justify-center mx-auto mb-4">
              <span class="text-2xl text-white">⚙️</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Cursus Ingénieur</h3>
            <p class="text-gray-700 font-semibold">Orientation Conception</p>
          </div>
          <ul class="space-y-3 text-gray-700">
            <li class="flex items-center">
              <div class="w-2 h-2 bg-gray-800 rounded-full mr-3"></div>
              <span>2 ans de tronc commun</span>
            </li>
            <li class="flex items-center">
              <div class="w-2 h-2 bg-gray-800 rounded-full mr-3"></div>
              <span>Spécialisation après la 3ème année</span>
            </li>
            <li class="flex items-center">
              <div class="w-2 h-2 bg-gray-800 rounded-full mr-3"></div>
              <span>Diplôme d'Ingénieur de conception</span>
            </li>
            <li class="flex items-center">
              <div class="w-2 h-2 bg-gray-800 rounded-full mr-3"></div>
              <span>Approche technique et applicative</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- Syllabus Download -->
      <div class="text-center">
        <a href="/syllabus.pdf" download class="inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-full font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
          <DownloadIcon class="mr-2 h-5 w-5" />
          Télécharger le Syllabus de Cours (PDF)
        </a>
      </div>
    </div>
  </section>

  <!-- SDIA Section -->
  <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="extremel max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            SDIA (Science de Données et Intelligence Artificielle)
          </span>
        </h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Une formation généraliste offrant des compétences solides en Data Science et Intelligence Artificielle
        </p>
      </div>

      <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>
          <h3 class="text-2xl font-bold text-gray-900 mb-6">Compétences Acquises</h3>
          <div class="space-y-4">
            <div v-for="skill in sdiaSkills" :key="skill" class="flex items-center bg-white rounded-xl p-4 shadow-sm">
              <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                <CheckIcon class="h-5 w-5 text-blue-600" />
              </div>
              <span class="text-gray-700 font-medium">{{ skill }}</span>
            </div>
          </div>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow-lg">
          <h3 class="text-2xl font-bold text-gray-900 mb-6">Valeur Ajoutée</h3>
          <p class="text-gray-600 mb-6 leading-relaxed">
            Notre cursus SDIA offre une approche équilibrée entre théorie et pratique,
            préparant les étudiants aux défis du marché de l'emploi en intelligence artificielle.
          </p>
          <div class="bg-blue-50 rounded-xl p-6">
            <QuoteIcon class="h-8 w-8 text-blue-600 mb-4" />
            <p class="text-gray-700 italic mb-4">
              "Le programme SDIA m'a offert les compétences nécessaires pour exceller
              dans le domaine de la data science. Une formation complète et moderne."
            </p>
            <p class="text-blue-600 font-semibold">- Ancien étudiant, Data Scientist chez Google</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Débouchés Métiers -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3extremelxl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Débouchés Métiers
          </span>
        </h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Découvrez les opportunités professionnelles après votre formation
        </p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div v-for="job in metiers" :key="job.title" class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-6 shadow-lg transform hover:scale-105 transition-transform duration-300">
          <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
            <component :is="job.icon" class="h-6 w-6 text-white" />
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">{{ job.title }}</h3>
          <p class="text-gray-600 mb-3">{{ job.role }}</p>
          <p class="text-sm text-blue-600 font-semibold">{{ job.sector }}</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Statistiques -->
  <section class="py-20 bg-gradient-to-br from-gray-900 to-blue-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
          Que deviennent nos étudiants après leur cursus ?
        </h2>
        <p class="text-xl opacity-90 max-w-3xl mx-auto">
          Découvrez les tendances migratoires et les opportunités de carrière
        </p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <div v-for="stat in studentStats" :key="stat.label" class="text-center">
          <div class="text-3xl md:text-4xl font-bold mb-2">{{ stat.value }}</div>
          <div class="text-blue-200">{{ stat.label }}</div>
        </div>
      </div>

      <!-- Graphiques -->
      <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
          <h3 class="text-xl font-semibold mb-4">Répartition des Débouchés</h3>
          <div class="h-64 flex items-center justify-center">
            <!-- Graphique circulaire placeholder -->
            <div class="w-48 h-48 rounded-full border-8 border-blue-400 border-t-purple-400 border-r-pink-400 border-b-green-400 animate-spin-slow"></div>
          </div>
        </div>
        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
          <h3 class="text-xl font-semibold mb-4">Évolution des Carrières</h3>
          <div class="h-64 flex items-center justify-center">
            <!-- Graphique barres placeholder -->
            <div class="flex items-end space-x-2 h-32">
              <div v-for="(bar, index) in [60, 80, 40, 70, 90]" :key="index"
                class="w-8 bg-gradient-to-t from-blue-400 to-purple-400 rounded-t"
                :style="`height: ${bar}px`">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import {
  DownloadIcon,
  CheckIcon,
  QuoteIcon,
  BrainIcon,
  DatabaseIcon,
  BarChart3Icon,
  CpuIcon,
  CodeIcon
} from 'lucide-vue-next'

const sdiaSkills = [
  'Machine Learning avancé',
  'Traitement du langage naturel',
  'Vision par ordinateur',
  'Big Data et Hadoop',
  'Deep Learning',
  'Analyse statistique'
]

const metiers = [
  {
    title: 'AI Researcher',
    role: 'Recherche en intelligence artificielle',
    sector: 'Recherche & Développement',
    icon: BrainIcon
  },
  {
    title: 'Data Scientist',
    role: 'Analyse et modélisation des données',
    sector: 'Tous secteurs confondus',
    icon: DatabaseIcon
  },
  {
    title: 'Data Analyst',
    role: 'Analyse business intelligence',
    sector: 'Finance, Marketing, Santé',
    icon: BarChart3Icon
  },
  {
    title: 'Machine Learning Engineer',
    role: 'Déploiement de modèles IA',
    sector: 'Technologie & Industrie',
    icon: CpuIcon
  },
  {
    title: 'Ingénieur IA',
    role: 'Développement solutions IA',
    sector: 'Entreprises technologiques',
    icon: CodeIcon
  },
  {
    title: 'Chief Data Officer',
    role: 'Stratégie données entreprise',
    sector: 'Direction générale',
    icon: BrainIcon
  }
]

const studentStats = [
  { value: '45%', label: 'Poursuite à l\'étranger' },
  { value: '25%', label: 'Doctorat' },
  { value: '20%', label: 'Industrie' },
  { value: '10%', label: 'Enseignement' }
]
</script>

<style scoped>
.animate-spin-slow {
  animation: spin 3s linear infinite;
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

.animate-fade-in-up {
  animation: fadeInUp 0.8s ease-out forwards;
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

<template>
  <!-- Hero Section -->
  <section class="relative py-20 bg-gradient-to-br from-purple-600 to-pink-700 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-up">
        Nos Objectifs
      </h1>
      <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 200ms">
        La feuille de route stratégique du Club IA-ENSPD pour les 5 prochaines années
      </p>
    </div>
  </section>

  <!-- Objectifs Permanents -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
            Objectifs Permanents
          </span>
        </h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Les fondations immuables de notre action quotidienne
        </p>
      </div>

      <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-8 shadow-lg">
          <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mb-6">
            <span class="text-2xl text-white">📊</span>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-4">Collecte de Données</h3>
          <p class="text-gray-600 mb-4">
            Assurer la collecte continue et sécurisée de données diversifiées pour enrichir nos modèles d'IA.
          </p>
          <div class="bg-white rounded-xl p-4">
            <p class="text-sm font-semibold text-purple-600">Objectif :</p>
            <p class="text-lg font-bold">+5 To de données africaines par trimestre</p>
          </div>
        </div>

        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-8 shadow-lg">
          <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mb-6">
            <span class="text-2xl text-white">🔍</span>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-4">Veille Technologique</h3>
          <p class="text-gray-600 mb-4">
            Maintenir une veille active sur les nouvelles avancées en IA et intégrer les technologies pertinentes.
          </p>
          <div class="bg-white rounded-xl p-4">
            <p class="text-sm font-semibold text-blue-600">Objectif :</p>
            <p class="text-lg font-bold">12 rapports de veille par an</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Objectifs par Horizon Temporel -->
  <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Feuille de Route Stratégique
          </span>
        </h2>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Court Terme -->
        <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
          <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="text-3xl text-green-600">🚀</span>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-4">Court Terme (6-12 mois)</h3>
          <ul class="space-y-3 text-left">
            <li class="flex items-center">
              <div class="w-2 h-2 bg-green-600 rounded-full mr-3"></div>
              <span>Rayonnement local : 10+ événements de sensibilisation</span>
            </li>
            <li class="flex items-center">
              <div class="w-2 h-2 bg-green-600 rounded-full mr-3"></div>
              <span>Communication : 5000+ visiteurs mensuels</span>
            </li>
            <li class="flex items-center">
              <div class="w-2 h-2 bg-green-600 rounded-full mr-3"></div>
              <span>Optimisation référencement</span>
            </li>
          </ul>
        </div>

        <!-- Moyen Terme -->
        <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
          <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="text-3xl text-yellow-600">⭐</span>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-4">Moyen Terme (1-3 ans)</h3>
          <ul class="space-y-3 text-left">
            <li class="flex items-center">
              <div class="w-2 h-2 bg-yellow-600 rounded-full mr-3"></div>
              <span>Innovation : 5+ projets IA concrets</span>
            </li>
            <li class="flex items-center">
              <div class="w-2 h-2 bg-yellow-600 rounded-full mr-3"></div>
              <span>Partenariats stratégiques : 3+ collaborations</span>
            </li>
            <li class="flex items-center">
              <div class="w-2 h-2 bg-yellow-600 rounded-full mr-3"></div>
              <span>Solutions pour problématiques locales</span>
            </li>
          </ul>
        </div>

        <!-- Long Terme -->
        <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
          <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="text-3xl text-red-600">🌍</span>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-4">Long Terme (3-5 ans)</h3>
          <ul class="space-y-3 text-left">
            <li class="flex items-center">
              <div class="w-2 h-2 bg-red-600 rounded-full mr-3"></div>
              <span>Pôle d'excellence panafricain</span>
            </li>
            <li class="flex items-center">
              <div class="w-2 h-2 bg-red-600 rounded-full mr-3"></div>
              <span>Centre de référence en IA</span>
            </li>
            <li class="flex items-center">
              <div class="w-2 h-2 bg-red-600 rounded-full mr-3"></div>
              <span>Attraction talents et investissements</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Indicateurs de Performance -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-gray-600 to-blue-600 bg-clip-text text-transparent">
            Indicateurs de Performance
          </span>
        </h2>
      </div>

      <div class="grid md:grid-cols-4 gap-6">
        <div v-for="kpi in kpis" :key="kpi.id" class="text-center p-6 bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl shadow-lg">
          <div class="text-3xl font-bold text-blue-600 mb-2">{{ kpi.valeur }}</div>
          <div class="text-sm text-gray-600">{{ kpi.label }}</div>
          <div class="w-full bg-gray-200 rounded-full h-2 mt-3">
            <div class="bg-blue-600 h-2 rounded-full" :style="`width: ${kpi.progress}%`"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
const kpis = [
  { id: 1, valeur: '75%', label: 'Collecte Données', progress: 75 },
  { id: 2, valeur: '60%', label: 'Visibilité', progress: 60 },
  { id: 3, valeur: '40%', label: 'Partenariats', progress: 40 },
  { id: 4, valeur: '25%', label: 'Projets IA', progress: 25 }
]
</script>

<style scoped>
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

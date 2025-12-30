<template>
  <!-- Hero Section -->
  <section class="relative py-20 bg-gradient-to-br from-indigo-600 to-purple-700 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-up">
        Résultats d'Analyse
      </h1>
      <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 200ms">
        Découvrez les insights générés à partir des données collectées
      </p>
    </div>
  </section>

  <!-- Remerciements -->
  <section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 shadow-lg">
        <h2 class="text-2xl font-bold text-indigo-900 mb-4">🙏 Merci à nos contributeurs !</h2>
        <p class="text-lg text-gray-700">
          Grâce à votre générosité, nous pouvons développer des modèles d'IA véritablement représentatifs
          de la diversité africaine. Vos données nous aident à construire l'avenir de l'intelligence
          artificielle en Afrique.
        </p>
        <p class="text-2xl font-bold text-indigo-600 mt-4">
          {{ $page.props.statistiques.total }} contributions au total !
        </p>
      </div>
    </div>
  </section>

  <!-- Visualisations Graphiques -->
  <section class="py-20 bg-gradient-to-br from-gray-50 to-indigo-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
            📊 Visualisations des Données
          </span>
        </h2>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Graphique 1 : Répartition par type -->
        <div class="bg-white rounded-2xl p-6 shadow-lg">
          <h3 class="text-xl font-bold text-gray-900 mb-4">Répartition des Contributions</h3>
          <div class="h-64 flex items-center justify-center">
            <div class="relative">
              <div class="w-40 h-40 rounded-full border-8 border-indigo-400 border-t-purple-400 border-r-pink-400 border-b-green-400 animate-spin-slow"></div>
              <div class="absolute inset-0 flex items-center justify-center">
                <span class="text-2xl font-bold text-indigo-600">{{ $page.props.statistiques.total }}</span>
              </div>
            </div>
          </div>
          <div class="mt-4 space-y-2">
            <div v-for="type in $page.props.statistiques.par_type" :key="type.type" class="flex justify-between text-sm">
              <span class="text-gray-600">{{ type.type }}:</span>
              <span class="font-semibold">{{ type.total }}</span>
            </div>
          </div>
        </div>

        <!-- Graphique 2 : Répartition par statut -->
        <div class="bg-white rounded-2xl p-6 shadow-lg">
          <h3 class="text-xl font-bold text-gray-900 mb-4">Statut des Contributions</h3>
          <div class="h-64 flex items-center justify-center">
            <div class="w-full">
              <div v-for="statut in $page.props.statistiques.par_statut" :key="statut.statut"
                class="h-4 bg-gradient-to-r from-indigo-400 to-purple-400 rounded mb-2"
                :style="`width: ${(statut.total / $page.props.statistiques.total) * 200}px`">
                <span class="text-xs text-white ml-2">{{ statut.statut }} ({{ statut.total }})</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Graphique 3 : Distribution Géographique -->
        <div class="bg-white rounded-2xl p-6 shadow-lg">
          <h3 class="text-xl font-bold text-gray-900 mb-4">Distribution Géographique</h3>
          <div class="h-64 flex items-center justify-center">
            <div class="w-40 h-40 bg-indigo-100 rounded-full flex items-center justify-center">
              <span class="text-4xl">🌍</span>
            </div>
          </div>
          <p class="text-sm text-gray-600 mt-4 text-center">
            Répartition géographique des contributeurs
          </p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
// Les données sont passées via $page.props.statistiques
</script>

<style scoped>
.animate-fade-in-up {
  animation: fadeInUp 0.8s ease-out forwards;
}

.animate-spin-slow {
  animation: spin 3s linear infinite;
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

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>

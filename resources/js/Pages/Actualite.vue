<template>
    <!-- Hero Section -->
    <section
        class="relative py-20 bg-gradient-to-br from-green-600 to-blue-700 text-white overflow-hidden"
    >
        <div class="absolute inset-0 bg-black/20"></div>
        <div
            class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center"
        >
            <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-up">
                Actualités
            </h1>
            <p
                class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto animate-fade-in-up"
                style="animation-delay: 200ms"
            >
                Restez informé des dernières avancées en IA et des événements du
                club
            </p>
        </div>
    </section>

    <!-- Actualités dans le Monde -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    <span
                        class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent"
                    >
                        Actualités dans le Monde
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Les dernières innovations et avancées en intelligence
                    artificielle à travers le monde
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    v-for="article in $page.props.actualitesMonde"
                    :key="article.id"
                    class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300"
                >
                    <div
                        class="h-48 bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center"
                    >
                        <img
                            v-if="article.image_url"
                            :src="article.image_url"
                            :alt="article.titre"
                            class="w-full h-full object-cover"
                        />
                        <span v-else class="text-4xl">📰</span>
                    </div>
                    <div class="p-6">
                        <span
                            class="text-sm font-semibold text-green-600 uppercase"
                            >{{ article.categorie }}</span
                        >
                        <h3 class="text-xl font-bold text-gray-900 mt-2 mb-3">
                            {{ article.titre }}
                        </h3>
                        <p class="text-gray-600 mb-4">
                            {{ article.contenu.substring(0, 100) }}...
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">{{
                                new Date(
                                    article.date_publication
                                ).toLocaleDateString()
                            }}</span>

                            <!-- Lien personnalisé "Lire plus" -->
                            <a
                                v-if="article.lien_externe"
                                :href="article.lien_externe"
                                class="text-green-600 hover:text-green-700 font-semibold flex items-center transition-colors"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                Lire plus
                                <ArrowRightIcon class="ml-1 h-4 w-4" />
                            </a>

                            <!-- Si pas de lien externe, afficher juste la date -->
                            <span v-else class="text-sm text-gray-500"
                                >Article complet</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Événements à Venir -->
 <section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
        <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
          Événements à Venir
        </span>
      </h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Découvrez les prochains événements organisés par le club IA-ENSPD
      </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div v-for="event in $page.props.evenements" :key="event.id"
           class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">

        <!-- Image de l'événement -->
        <div class="h-40 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center relative">
          <img v-if="event.image_url" :src="event.image_url" :alt="event.titre"
               class="w-full h-full object-cover">
          <div v-else class="text-white text-3xl">📅</div>
          <div class="absolute inset-0 bg-black/10"></div>
        </div>

        <div class="p-5">
          <!-- Badge Événement -->
          <div class="mb-3">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
              Événement
            </span>
          </div>

          <!-- Titre -->
          <h3 class="text-lg font-bold text-gray-900 mb-3 line-clamp-2">{{ event.titre }}</h3>

          <!-- Date -->
          <div class="flex items-center text-gray-600 mb-2">
            <CalendarIcon class="h-4 w-4 mr-2 text-blue-500" />
            <span class="text-sm">
              {{ formatEventDate(event.date_debut, event.date_fin) }}
            </span>
          </div>

          <!-- Lieu -->
          <div class="flex items-center text-gray-600 mb-3">
            <MapPinIcon class="h-4 w-4 mr-2 text-blue-500" />
            <span class="text-sm">{{ event.lieu }}</span>
          </div>

          <!-- Description -->
          <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4">
            {{ event.description }}
          </p>

          <!-- Bouton Voir plus -->
          <div class="flex justify-between items-center pt-3 border-t border-gray-100">
            <span class="text-xs text-gray-500">
              {{ event.est_actif ? 'Actif' : 'Complet' }}
            </span>

          </div>
        </div>
      </div>
    </div>

    <!-- Message si aucun événement -->
    <div v-if="$page.props.evenements.length === 0" class="text-center py-12">
      <div class="bg-white rounded-xl p-8 shadow-lg">
        <div class="text-6xl mb-4">📅</div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Aucun événement à venir</h3>
        <p class="text-gray-600">Revenez bientôt pour découvrir nos prochains événements</p>
      </div>
    </div>
  </div>
</section>
</template>

<script setup>
import { ArrowRightIcon, CalendarIcon, MapPinIcon, } from "lucide-vue-next";
import { useForm } from "@inertiajs/vue3";

const sInscrire = (eventId) => {
    useForm({}).post(route("evenements.inscrire", eventId), {
        preserveScroll: true,
        onSuccess: () => {
            // Recharger la page pour voir la mise à jour
            window.location.reload();
        },
    });
};
// Fonction pour formater les dates
const formatEventDate = (dateDebut, dateFin) => {
  const start = new Date(dateDebut)
  const end = dateFin ? new Date(dateFin) : null

  const options = { day: 'numeric', month: 'short' }

  if (!end || start.toDateString() === end.toDateString()) {
    // Même jour
    return start.toLocaleDateString('fr-FR', options)
  } else {
    // Plusieurs jours
    return `${start.toLocaleDateString('fr-FR', options)} - ${end.toLocaleDateString('fr-FR', options)}`
  }
}
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


.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
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

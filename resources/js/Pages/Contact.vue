<template>
  <!-- Hero Section -->
  <section class="relative py-20 bg-gradient-to-br from-blue-600 to-cyan-700 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-up">
        Contact
      </h1>
      <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 200ms">
        Restons connectés pour construire l'avenir de l'IA ensemble
      </p>
    </div>
  </section>

  <!-- Canaux de Communication avec emojis -->
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent">
            📞 Canaux de Communication
          </span>
        </h2>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div v-for="channel in canaux" :key="channel.id"
          class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-6 text-center shadow-lg transform hover:scale-105 transition-transform duration-300">
          <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="text-2xl text-white">{{ channel.emoji }}</span>
          </div>
          <h3 class="text-lg font-bold text-gray-900 mb-2">{{ channel.nom }}</h3>
          <p class="text-sm text-gray-600 mb-3">{{ channel.description }}</p>
          <p class="text-xs text-blue-600 font-semibold">⏱️ {{ channel.delai }}</p>
          <a :href="channel.lien" class="inline-block mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors">
            Contacter
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ... le reste du template reste inchangé ... -->
</template>

<script setup>
import { ref } from 'vue'

const formData = ref({
  prenom: '',
  nom: '',
  email: '',
  sujet: '',
  message: ''
})

// Version avec emojis au lieu d'icônes
const canaux = [
  {
    id: 1,
    nom: 'WhatsApp',
    emoji: '💬',
    description: 'Questions générales et suggestions',
    delai: 'Réponse immédiate',
    lien: 'https://wa.me/237XXXXXXXXX'
  },
  {
    id: 2,
    nom: 'Messenger',
    emoji: '📱',
    description: 'Événements et créativité',
    delai: '24h max',
    lien: 'https://m.me/clubiaenspd'
  },
  {
    id: 3,
    nom: 'Email',
    emoji: '📧',
    description: 'Communications formelles',
    delai: '48h max',
    lien: 'mailto:contact@clubia-enspd.cm'
  },
  {
    id: 4,
    nom: 'LinkedIn',
    emoji: '💼',
    description: 'Partenariats professionnels',
    delai: '72h max',
    lien: 'https://linkedin.com/company/clubiaenspd'
  }
]

const faqs = [
  {
    id: 1,
    question: "Comment rejoindre le club ?",
    reponse: "Envoyez-nous un message via le formulaire ou WhatsApp avec votre motivation et compétences."
  },
  {
    id: 2,
    question: "Quand se réunit le club ?",
    reponse: "Tous les samedis de 10h à 12h au campus PK17. Consultez l'agenda pour les événements spéciaux."
  },
  {
    id: 3,
    question: "Faut-il être expert en IA pour contribuer ?",
    reponse: "Non ! Tous les niveaux sont les bienvenus. L'enthousiasme et la motivation sont nos critères principaux."
  }
]

const submitForm = () => {
  console.log('Formulaire soumis:', formData.value)
}
</script>

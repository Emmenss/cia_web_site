<template>
  <footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiMzNzM3MzciIG9wYWNpdHk9Ii4xIj48Y2lyY2xlIGN4PSIzMCIgY3k9IjMwIiByPSIyIi8+PC9nPjwvZz48L3N2Zz4=')] opacity-10"></div>

    <div class="relative max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="md:col-span-2">
          <div class="flex items-center space-x-4 mb-6">
            <div class="h-12 w-12 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold">
              <span>IA</span>
            </div>
            <span class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Club IA-ENSPD</span>
          </div>
          <p class="text-gray-300 leading-relaxed max-w-md">
            Leader en innovation et formation en intelligence artificielle au Cameroun et en Afrique.
          </p>
        </div>

        <div>
          <h3 class="text-lg font-semibold mb-6 text-white">Navigation</h3>
          <ul class="space-y-3">
            <li v-for="item in navigation" :key="item.name">
              <a :href="item.href" class="text-gray-300 hover:text-white transition-colors duration-300 hover:translate-x-1 transform block">
                {{ item.name }}
              </a>
            </li>
          </ul>
        </div>

        <div>
          <h3 class="text-lg font-semibold mb-6 text-white">Contact</h3>
          <div class="space-y-3">
            <p class="text-gray-300">Campus PK 17 Logbessous<br>Douala, Cameroun</p>
            <p class="text-gray-300">contact@clubia-enspd.cm</p>
            <div class="flex space-x-4 pt-4">
              <a v-for="social in socials" :key="social.name" :href="social.href" class="p-2 bg-white/10 rounded-lg hover:bg-white/20 transition-all duration-300 transform hover:scale-110">
                <component :is="social.icon" class="h-5 w-5" />
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="border-t border-gray-700/50 mt-12 pt-8 text-center">
        <p class="text-gray-400">
          © 2025 Club IA-ENSPD. Tous droits réservés.
          <span class="text-blue-300">Made with ❤️ for Africa</span>
        </p>
      </div>
    </div>
  </footer>
</template>

<script setup>
import {
  FacebookIcon,
  TwitterIcon,
  InstagramIcon,
  LinkedinIcon,
  YoutubeIcon
} from 'lucide-vue-next'

const navigation = [
  { name: 'Accueil', href: '/' },
  { name: 'Espace Étudiant', href: '/espace-etudiant' },
  { name: 'Actualité', href: '/actualite' },
  { name: 'Nos Objectifs', href: '/objectifs' },
  { name: 'Nos Réalisations', href: '/realisations' },
  { name: 'Collecte de données', href: '/collecte-donnees' },
  { name: 'Résultat Analyse', href: '/resultats-analyse' },
  { name: 'Contact', href: '/contact' },
]

const socials = [
  { name: 'Facebook', href: '#', icon: FacebookIcon },
  { name: 'Twitter', href: '#', icon: TwitterIcon },
  { name: 'Instagram', href: '#', icon: InstagramIcon },
  { name: 'LinkedIn', href: '#', icon: LinkedinIcon },
  { name: 'YouTube', href: '#', icon: YoutubeIcon },
]
</script>

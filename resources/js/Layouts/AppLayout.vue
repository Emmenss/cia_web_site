<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
    <!-- Header avec navigation -->
    <header class="bg-white/95 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-gray-200/50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
          <!-- Logos -->
          <div class="flex items-center space-x-4">
            <Link href="/" class="flex items-center space-x-4">
              <div class="h-12 w-12 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg transform hover:scale-105 transition-transform duration-300">
                <span class="text-lg">IA</span>
              </div>
              <div class="h-12 w-12 bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl flex items-center justify-center text-white font-bold text-xs shadow-lg transform hover:scale-105 transition-transform duration-300">
                <span class="text-xs">ENSPD</span>
              </div>
            </Link>
          </div>

          <!-- Navigation principale -->
          <nav class="hidden md:flex space-x-1">
            <Link
              v-for="(item, index) in navigation"
              :key="item.name"
              :href="item.href"
              class="relative px-6 py-3 text-gray-700 hover:text-blue-600 font-medium transition-all duration-300 group"
              :class="{ 'text-blue-600': $page.url === item.href }"
              :style="`transition-delay: ${index * 50}ms`"
            >
              <span class="relative z-10">{{ item.name }}</span>
              <div class="absolute inset-0 bg-blue-100 rounded-xl transform scale-0 group-hover:scale-100 transition-transform duration-300 opacity-0 group-hover:opacity-100"></div>
              <div
                class="absolute bottom-0 left-0 h-0.5 bg-blue-600 transition-all duration-300"
                :class="$page.url === item.href ? 'w-full' : 'w-0 group-hover:w-full'"
              ></div>
            </Link>
          </nav>

          <!-- Réseaux sociaux -->
          <div class="flex items-center space-x-3">
            <a
              v-for="social in socials"
              :key="social.name"
              :href="social.href"
              class="p-2 bg-white rounded-lg shadow-sm hover:shadow-md transform hover:scale-110 transition-all duration-300 hover:bg-blue-50 group"
            >
              <component :is="social.icon" class="h-5 w-5 text-gray-600 group-hover:text-blue-600" />
            </a>
          </div>

          <!-- Menu mobile -->
          <div class="md:hidden">
            <button
              @click="mobileMenuOpen = !mobileMenuOpen"
              class="p-2 bg-white rounded-lg shadow-sm hover:shadow-md transform hover:scale-105 transition-all duration-300"
            >
              <MenuIcon class="h-6 w-6 text-gray-600" />
            </button>
          </div>
        </div>
      </div>

      <!-- Menu mobile déroulant -->
      <transition
        enter-active-class="transition-all duration-300 ease-out"
        leave-active-class="transition-all duration-200 ease-in"
        enter-from-class="opacity-0 -translate-y-4"
        leave-to-class="opacity-0 -translate-y-4"
      >
        <div v-if="mobileMenuOpen" class="md:hidden bg-white/95 backdrop-blur-md border-t border-gray-200/50">
          <div class="px-4 py-6 space-y-3">
            <Link
              v-for="(item, index) in navigation"
              :key="item.name"
              :href="item.href"
              class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-300 transform hover:translate-x-2 font-medium"
              :class="{ 'text-blue-600 bg-blue-50': $page.url === item.href }"
              :style="`transition-delay: ${index * 100}ms`"
              @click="mobileMenuOpen = false"
            >
              {{ item.name }}
            </Link>
          </div>
        </div>
      </transition>
    </header>

    <!-- Contenu de la page -->
    <main>
      <slot />
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-white py-12 mt-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-gray-300">© 2025 Club IA-ENSPD. Tous droits réservés.</p>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'
import {
  MenuIcon,
  FacebookIcon,
  TwitterIcon,
  InstagramIcon,
  LinkedinIcon,
  YoutubeIcon
} from 'lucide-vue-next'

const mobileMenuOpen = ref(false)

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

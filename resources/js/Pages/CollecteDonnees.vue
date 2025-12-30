<template>
  <!-- Hero Section -->
  <section class="relative py-20 bg-gradient-to-br from-green-600 to-teal-700 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-up">
        Collecte de Données
      </h1>
      <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 200ms">
        Contribuez à une intelligence artificielle responsable et adaptée à l'écosystème africain
      </p>
    </div>
  </section>

  <!-- Introduction -->
  <section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <p class="text-xl text-gray-600 leading-relaxed mb-8">
        <span class="text-green-600 font-semibold">Votre contribution est essentielle</span> pour construire
        des modèles d'IA qui reflètent la diversité et la richesse de notre continent.
        Chaque donnée partagée nous aide à réduire les biais et à développer des solutions
        véritablement adaptées à nos réalités africaines.
      </p>
      <div class="bg-green-50 rounded-xl p-6 border border-green-200">
        <h3 class="text-lg font-semibold text-green-800 mb-3">🐘 Pourquoi c'est important ?</h3>
        <p class="text-green-700">
          Les données africaines sont sous-représentées dans les modèles d'IA internationaux.
          En partageant vos données, vous participez à la création d'une IA inclusive et représentative.
        </p>
      </div>
    </div>
  </section>

  <!-- Types de Contribution -->
  <section class="py-20 bg-gradient-to-br from-gray-50 to-green-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-green-600 to-teal-600 bg-clip-text text-transparent">
            Comment Contribuer ?
          </span>
        </h2>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Images -->
        <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
          <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="text-2xl text-white">🖼️</span>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Images</h3>
          <p class="text-gray-600 mb-4">Photos représentant la diversité africaine</p>
          <ul class="text-sm text-gray-600 space-y-1 text-left">
            <li>• Personnes africaines</li>
            <li>• Scènes de vie quotidienne</li>
            <li>• Images médicales</li>
            <li>• Agriculture et élevage</li>
          </ul>
          <button @click="activeForm = 'image'" class="mt-4 bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition-colors">
            Contribuer
          </button>
        </div>

        <!-- Textes -->
        <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
          <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="text-2xl text-white">📝</span>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Textes</h3>
          <p class="text-gray-600 mb-4">Récits et textes en langues africaines</p>
          <ul class="text-sm text-gray-600 space-y-1 text-left">
            <li>• Contes et histoires</li>
            <li>• Traditions culturelles</li>
            <li>• Textes en langues locales</li>
            <li>• Savoirs traditionnels</li>
          </ul>
          <button @click="activeForm = 'texte'" class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition-colors">
            Contribuer
          </button>
        </div>

        <!-- Datasets -->
        <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
          <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="text-2xl text-white">📊</span>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Jeux de Données</h3>
          <p class="text-gray-600 mb-4">Données structurées et datasets complets</p>
          <ul class="text-sm text-gray-600 space-y-1 text-left">
            <li>• Données environnementales</li>
            <li>• Données économiques</li>
            <li>• Données sanitaires</li>
            <li>• Données agricoles</li>
          </ul>
          <button @click="activeForm = 'dataset'" class="mt-4 bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition-colors">
            Contribuer
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Formulaire Dynamique -->
  <section class="py-20 bg-white" v-if="activeForm">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-8 shadow-lg">

        <!-- Formulaire Images -->
        <div v-if="activeForm === 'image'" class="animate-fade-in-up">
          <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-900">📸 Contribuer avec des Images</h3>
            <button @click="resetForm" class="text-gray-500 hover:text-gray-700">
              ✕
            </button>
          </div>

          <form @submit.prevent="submitForm" class="space-y-6" enctype="multipart/form-data">
            <input type="hidden" name="type" value="image">

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Titre de la Contribution *</label>
              <input v-model="formData.titre" type="text" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="ex: Portrait femme Bamiléké">
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Nature de l'Image *</label>
              <select v-model="formData.nature" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <option value="">Sélectionnez la nature</option>
                <option value="portrait">Portrait personne africaine</option>
                <option value="medical">Image médicale</option>
                <option value="agriculture">Agriculture</option>
                <option value="elevage">Élevage</option>
                <option value="culture">Scène culturelle</option>
                <option value="urbain">Environnement urbain</option>
                <option value="nature">Nature/paysage</option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Description *</label>
              <textarea v-model="formData.description" rows="3" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Décrivez l'image, le contexte, la région..."></textarea>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Télécharger des Images *</label>
              <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-green-400 transition-colors">
                <input type="file" multiple accept="image/*" required class="hidden" id="image-upload" @change="handleImageUpload" ref="imageInput">
                <label for="image-upload" class="cursor-pointer">
                  <span class="text-4xl">📁</span>
                  <p class="text-gray-600 mt-2">Glissez-déposez vos images ou</p>
                  <span class="inline-block mt-2 bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition-colors">
                    Parcourir
                  </span>
                </label>
                <div v-if="uploadedImages.length > 0" class="mt-4">
                  <p class="text-sm text-green-600">{{ uploadedImages.length }} image(s) sélectionnée(s)</p>
                  <ul class="text-xs text-gray-500 mt-1">
                    <li v-for="(image, index) in uploadedImages" :key="index">{{ image.name }}</li>
                  </ul>
                </div>
                <p class="text-xs text-gray-500 mt-2">Formats: JPG, PNG, GIF • Max 10MB par image</p>
              </div>
            </div>

            <div class="flex space-x-4">
              <button type="button" @click="resetForm" class="flex-1 bg-gray-500 text-white py-3 rounded-full font-semibold hover:bg-gray-600 transition-colors">
                Annuler
              </button>
              <button type="submit" :disabled="isProcessing" class="flex-1 bg-green-600 text-white py-3 rounded-full font-semibold hover:bg-green-700 transition-colors disabled:bg-gray-400">
                <span v-if="isProcessing">Envoi en cours...</span>
                <span v-else>📤 Envoyer les Images</span>
              </button>
            </div>
          </form>
        </div>

        <!-- Formulaire Textes -->
        <div v-if="activeForm === 'texte'" class="animate-fade-in-up">
          <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-900">📝 Contribuer avec du Texte</h3>
            <button @click="resetForm" class="text-gray-500 hover:text-gray-700">
              ✕
            </button>
          </div>

          <form @submit.prevent="submitForm" class="space-y-6">
            <input type="hidden" name="type" value="texte">

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Titre du Texte *</label>
              <input v-model="formData.titre" type="text" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="ex: Conte traditionnel Bassa">
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Thématique *</label>
              <select v-model="formData.thematique" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Sélectionnez la thématique</option>
                <option value="contes">Contes et légendes</option>
                <option value="traditions">Traditions culturelles</option>
                <option value="histoire">Histoire locale</option>
                <option value="savoir">Savoirs traditionnels</option>
                <option value="quotidien">Vie quotidienne</option>
                <option value="autre">Autre</option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Langue *</label>
              <select v-model="formData.langue" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Sélectionnez la langue</option>
                <option value="français">Français</option>
                <option value="anglais">Anglais</option>
                <option value="ewondo">Ewondo</option>
                <option value="dual">Duala</option>
                <option value="bassa">Bassa</option>
                <option value="autre">Autre langue locale</option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Votre Texte *</label>
              <textarea v-model="formData.contenu_texte" rows="6" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Racontez votre histoire, tradition ou savoir... (minimum 200 caractères)"></textarea>
              <p class="text-sm text-gray-500 mt-1">{{ formData.contenu_texte ? formData.contenu_texte.length : 0 }} caractères</p>
            </div>

            <div class="bg-blue-50 rounded-lg p-4">
              <h4 class="font-semibold text-blue-800 mb-2">💡 Exemples de contributions :</h4>
              <ul class="text-sm text-blue-700 space-y-1">
                <li>• Récit sur la dot et le mariage traditionnel</li>
                <li>• Description des funérailles et rites</li>
                <li>• Jeux culturels et traditionnels</li>
                <li>• Organisation des chefferies</li>
                <li>• Recettes de médecine traditionnelle</li>
              </ul>
            </div>

            <div class="flex space-x-4">
              <button type="button" @click="resetForm" class="flex-1 bg-gray-500 text-white py-3 rounded-full font-semibold hover:bg-gray-600 transition-colors">
                Annuler
              </button>
              <button type="submit" :disabled="isProcessing" class="flex-1 bg-blue-600 text-white py-3 rounded-full font-semibold hover:bg-blue-700 transition-colors disabled:bg-gray-400">
                <span v-if="isProcessing">Envoi en cours...</span>
                <span v-else>📤 Envoyer le Texte</span>
              </button>
            </div>
          </form>
        </div>

        <!-- Formulaire Datasets -->
        <div v-if="activeForm === 'dataset'" class="animate-fade-in-up">
          <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-900">📊 Contribuer avec un Dataset</h3>
            <button @click="resetForm" class="text-gray-500 hover:text-gray-700">
              ✕
            </button>
          </div>

          <form @submit.prevent="submitForm" class="space-y-6" enctype="multipart/form-data">
            <input type="hidden" name="type" value="dataset">

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Nom du Dataset *</label>
              <input v-model="formData.titre" type="text" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="ex: donnees_agriculture_cameroun">
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Domaine Concerné *</label>
              <select v-model="formData.domaine" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                <option value="">Sélectionnez le domaine</option>
                <option value="sante">Santé</option>
                <option value="agriculture">Agriculture</option>
                <option value="elevage">Élevage</option>
                <option value="environnement">Environnement</option>
                <option value="education">Éducation</option>
                <option value="economie">Économie</option>
                <option value="transport">Transport</option>
                <option value="autre">Autre</option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Description des Données *</label>
              <textarea v-model="formData.description" rows="4" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Décrivez les variables, la méthodologie de collecte, la période..."></textarea>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Télécharger le Dataset *</label>
              <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-purple-400 transition-colors">
                <input type="file" accept=".csv,.txt,.xlsx,.xls,.json" required class="hidden" id="dataset-upload" @change="handleDatasetUpload" ref="datasetInput">
                <label for="dataset-upload" class="cursor-pointer">
                  <span class="text-4xl">💾</span>
                  <p class="text-gray-600 mt-2">Glissez-déposez votre fichier ou</p>
                  <span class="inline-block mt-2 bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition-colors">
                    Parcourir
                  </span>
                </label>
                <div v-if="uploadedDataset" class="mt-4">
                  <p class="text-sm text-purple-600">Fichier sélectionné: {{ uploadedDataset.name }}</p>
                  <p class="text-xs text-gray-500">Taille: {{ (uploadedDataset.size / 1024 / 1024).toFixed(2) }} MB</p>
                </div>
                <p class="text-xs text-gray-500 mt-2">Formats acceptés: CSV, TXT, Excel, JSON • Max 50MB</p>
              </div>
            </div>

            <div class="bg-purple-50 rounded-lg p-4">
              <h4 class="font-semibold text-purple-800 mb-2">🌍 Préférence Africaine</h4>
              <p class="text-sm text-purple-700">
                Nous privilégions les données issues du contexte africain pour une IA véritablement représentative de notre écosystème.
              </p>
            </div>

            <div class="flex space-x-4">
              <button type="button" @click="resetForm" class="flex-1 bg-gray-500 text-white py-3 rounded-full font-semibold hover:bg-gray-600 transition-colors">
                Annuler
              </button>
              <button type="submit" href="/contributions" :disabled="isProcessing" class="flex-1 bg-purple-600 text-white py-3 rounded-full font-semibold hover:bg-purple-700 transition-colors disabled:bg-gray-400">
                <span v-if="isProcessing">Envoi en cours...</span>
                <span v-else>📤 Envoyer le Dataset</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Confidentialité et Éthique -->
  <section class="py-20 bg-gradient-to-br from-blue-50 to-cyan-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">
          <span class="bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent">
            🔒 Confidentialité et Éthique
          </span>
        </h2>
      </div>

      <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white rounded-xl p-6 shadow-lg">
          <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mb-4">
            <span class="text-white">✓</span>
          </div>
          <h3 class="text-lg font-semibold text-gray-900 mb-3">Consentement Explicite</h3>
          <p class="text-gray-600">Toutes les contributions sont soumises à un consentement éclairé et peuvent être retirées à tout moment.</p>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-lg">
          <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-4">
            <span class="text-white">🔐</span>
          </div>
          <h3 class="text-lg font-semibold text-gray-900 mb-3">Sécurité des Données</h3>
          <p class="text-gray-600">Chiffrement de bout en bout et stockage sécurisé conforme aux réglementations RGPD et locales.</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, reactive } from 'vue'

const activeForm = ref(null)
const imageInput = ref(null)
const datasetInput = ref(null)
const uploadedImages = ref([])
const uploadedDataset = ref(null)
const isProcessing = ref(false)

const formData = reactive({
  type: '',
  titre: '',
  nature: '',
  thematique: '',
  langue: '',
  domaine: '',
  description: '',
  contenu_texte: ''
})

const handleImageUpload = (event) => {
  const files = event.target.files
  if (files && files.length > 0) {
    uploadedImages.value = Array.from(files)
  }
}

const handleDatasetUpload = (event) => {
  const file = event.target.files[0]
  if (file) {
    uploadedDataset.value = file
  }
}

const resetForm = () => {
  // Réinitialiser tous les champs
  formData.type = ''
  formData.titre = ''
  formData.nature = ''
  formData.thematique = ''
  formData.langue = ''
  formData.domaine = ''
  formData.description = ''
  formData.contenu_texte = ''

  uploadedImages.value = []
  uploadedDataset.value = null
  activeForm.value = null
  isProcessing.value = false

  // Réinitialiser les inputs fichiers
  if (imageInput.value) imageInput.value.value = ''
  if (datasetInput.value) datasetInput.value.value = ''
}

const submitForm = async () => {
  if (isProcessing.value) return

  isProcessing.value = true

  try {
    const formDataToSend = new FormData()

    // Ajouter le type et le titre
    formDataToSend.append('type', activeForm.value)
    formDataToSend.append('titre', formData.titre)

    // Ajouter les champs spécifiques au type
    if (activeForm.value === 'image') {
      formDataToSend.append('nature', formData.nature)
      formDataToSend.append('description', formData.description)

      // Ajouter les images
      if (uploadedImages.value.length > 0) {
        uploadedImages.value.forEach((image, index) => {
          formDataToSend.append('images[]', image)
        })
      } else {
        throw new Error('Veuillez sélectionner au moins une image')
      }
    }
    else if (activeForm.value === 'texte') {
      formDataToSend.append('thematique', formData.thematique)
      formDataToSend.append('langue', formData.langue)
      formDataToSend.append('contenu_texte', formData.contenu_texte)
    }
    else if (activeForm.value === 'dataset') {
      formDataToSend.append('domaine', formData.domaine)
      formDataToSend.append('description', formData.description)

      // Ajouter le fichier dataset
      if (uploadedDataset.value) {
        formDataToSend.append('fichier_dataset', uploadedDataset.value)
      } else {
        throw new Error('Veuillez sélectionner un fichier')
      }
    }

    // CORRECTION : Utilisation directe de l'URL au lieu de route()
    const url = '/contributions'; // URL directe au lieu de route('contributions.store')

    // Envoyer la requête
    const response = await fetch(url, {
      method: 'POST',
      body: formDataToSend,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      }
    })

    const data = await response.json()

    if (response.ok && data.success) {
      // Succès
      alert(data.message || 'Votre contribution a été envoyée avec succès !')
      resetForm()
    } else {
      // Erreur
      throw new Error(data.message || JSON.stringify(data.errors) || 'Erreur lors de l\'envoi')
    }

  } catch (error) {
    console.error('Erreur:', error)
    alert(error.message || 'Une erreur est survenue. Veuillez réessayer.')
  } finally {
    isProcessing.value = false
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
</style>

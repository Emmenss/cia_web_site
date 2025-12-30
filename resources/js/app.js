import './bootstrap'
import '../css/app.css'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'

// Importez votre layout
import AppLayout from './Layouts/AppLayout.vue'

const appName = import.meta.env.VITE_APP_NAME || 'Club IA-ENSPD'

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => {
    const page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'))

    // Ajoutez cette partie pour wrapper toutes les pages avec AppLayout
   page.then((module) => {
  // Seulement si ce n'est pas une page admin
  if (!module.default.layout && !name.startsWith('Admin/')) {
    module.default.layout = AppLayout
  }
  return module
})
    return page
  },
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})

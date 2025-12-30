<!-- resources/js/Layouts/AdminLayout.vue -->
<template>
  <div class="min-h-screen bg-gray-50 flex">
    <!-- Sidebar -->
    <AdminSidebar :stats="stats" />

    <!-- Main Content -->
    <div class="flex-1 lg:ml-64 min-w-0">
      <!-- Header -->
      <AdminHeader :title="title" :description="description" :stats="stats" />

      <!-- Page Content -->
      <main class="p-6">
        <slot />
      </main>
    </div>
  </div>
</template>

<script setup>
import AdminSidebar from '@/Components/Admin/AdminSidebar.vue'
import AdminHeader from '@/Components/Admin/AdminHeader.vue'

defineProps({
  title: String,
  description: String,
  stats: {
    type: Object,
    default: () => ({
      contributions_pending: 0,
      actualites_count: 0,
      evenements_count: 0,
      projets_count: 0
    })
  }
})
</script>

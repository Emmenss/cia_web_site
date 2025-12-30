<!-- resources/js/Pages/Admin/Dashboard.vue -->
<template>
  <AdminLayout
    title="Tableau de bord"
    description="Vue d'ensemble de l'administration"
    :stats="stats"
  >
    <div class="space-y-6">
      <!-- Cartes de statistiques -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <StatCard
          title="Actualités"
          :value="stats.actualites_count"
          :icon="NewspaperIcon"
          color="blue"
          to="/admin/actualites"
        />
        <StatCard
          title="Événements"
          :value="stats.evenements_count"
          :icon="CalendarIcon"
          color="green"
          to="/admin/evenements"
        />
        <StatCard
          title="Projets"
          :value="stats.projets_count"
          :icon="FolderOpenIcon"
          color="purple"
          to="/admin/projets"
        />
        <StatCard
          title="Contributions en attente"
          :value="stats.contributions_pending"
          :icon="ShieldIcon"
          color="red"
          to="/admin/contributions"
        />
      </div>

      <!-- Grille principale -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Contributions récentes -->
        <DashboardCard
          title="Contributions à modérer"
          action-label="Voir tout"
          action-to="/admin/contributions"
        >
          <ContributionsList :contributions="recentContributions" />
        </DashboardCard>

        <!-- Activité récente -->
        <DashboardCard title="Activité récente">
          <ActivityTimeline :activities="recentActivities" />
        </DashboardCard>
      </div>

      <!-- Actions rapides -->
      <DashboardCard title="Actions rapides">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
          <QuickAction
            title="Nouvelle actualité"
            :icon="PlusIcon"
            to="/admin/actualites/create"
            color="blue"
          />
          <QuickAction
            title="Nouvel événement"
            :icon="PlusIcon"
            to="/admin/evenements/create"
            color="green"
          />
          <QuickAction
            title="Nouveau projet"
            :icon="PlusIcon"
            to="/admin/projets/create"
            color="purple"
          />
          <QuickAction
            title="Modérer"
            :icon="ShieldIcon"
            to="/admin/contributions"
            color="red"
          />
        </div>
      </DashboardCard>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import StatCard from '@/Components/Admin/StatCard.vue'
import DashboardCard from '@/Components/Admin/DashboardCard.vue'
import ContributionsList from '@/Components/Admin/ContributionsList.vue'
//import ActivityTimeline from '@/Components/Admin/ActivityTimeline.vue'
import QuickAction from '@/Components/Admin/QuickAction.vue'
import { NewspaperIcon, CalendarIcon, FolderOpenIcon, ShieldIcon, PlusIcon } from 'lucide-vue-next'

defineProps({
  stats: Object,
  recentContributions: Array,
  recentActivities: Array
})

defineOptions({
  layout: AdminLayout
})
</script>

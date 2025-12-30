<!-- resources/js/Components/Admin/AdminSidebar.vue -->
<template>
    <aside
        class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-900 text-white transform lg:translate-x-0 transition-transform duration-300 ease-in-out"
    >
        <!-- Logo -->
        <div
            class="flex items-center justify-center h-20 px-6 border-b border-gray-800"
        >
            <div class="flex items-center space-x-3">
                <div
                    class="h-10 w-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center"
                >
                    <CpuIcon class="h-6 w-6 text-white" />
                </div>
                <div>
                    <span class="text-lg font-semibold">Admin Panel</span>
                    <p class="text-xs text-gray-400">Club IA-ENSPD</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="mt-8 px-4">
            <div class="space-y-1">
                <!-- Tableau de bord -->
                <NavItem
                    href="/admin/dashboard"
                    :icon="LayoutDashboardIcon"
                    label="Tableau de bord"
                    :active="$page.url === '/admin/dashboard'"
                />

                <!-- Gestion de contenu -->
                <NavSection title="Gestion de contenu">
                    <NavItem
                        href="/admin/actualites"
                        :icon="NewspaperIcon"
                        label="Actualités"
                        :active="$page.url.startsWith('/admin/actualites')"
                    />
                    <NavItem
                        href="/admin/evenements"
                        :icon="CalendarIcon"
                        label="Événements"
                        :active="$page.url.startsWith('/admin/evenements')"
                    />
                    <NavItem
                        href="/admin/projets"
                        :icon="FolderOpenIcon"
                        label="Projets"
                        :active="$page.url.startsWith('/admin/projets')"
                    />
                </NavSection>

                <!-- Modération -->
                <NavSection title="Modération">
                    <NavItem
                        href="/admin/contributions"
                        :icon="ShieldIcon"
                        label="Contributions"
                        :active="$page.url.startsWith('/admin/contributions')"
                        :badge="stats.contributions_pending"
                        badge-color="red"
                    />
                </NavSection>
                <!-- Dans AdminSidebar.vue -->
                <NavSection title="Contenu Principal">
                    <NavItem
                        href="/admin/carousel"
                        :icon="ImageIcon"
                        label="Carousel Accueil"
                        :active="$page.url.startsWith('/admin/carousel')"
                    />
                    <NavItem
                        href="/admin/meilleure-realisation/edit"
                        :icon="TrophyIcon"
                        label="Meilleure Réalisation"
                        :active="$page.url.startsWith('/admin/meilleure-realisation')"
                    />
                </NavSection>
            </div>
        </nav>

        <!-- Footer Sidebar -->
        <div
            class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-800"
        >
            <Link
                href="/"
                class="flex items-center space-x-2 text-gray-400 hover:text-white transition-colors duration-200"
            >
                <ArrowLeftIcon class="h-4 w-4" />
                <span class="text-sm">Retour au site</span>
            </Link>
        </div>
    </aside>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import {
    CpuIcon,
    ArrowLeftIcon,
    LayoutDashboardIcon,
    NewspaperIcon,
    CalendarIcon,
    FolderOpenIcon,
    ShieldIcon,
  TrophyIcon,
  ImageIcon
} from "lucide-vue-next";
import NavItem from "@/Components/Admin/NavItem.vue";
import NavSection from "@/Components/Admin/NavSection.vue";

defineProps({
    stats: {
        type: Object,
        default: () => ({
            contributions_pending: 0,
        }),
    },
});
</script>

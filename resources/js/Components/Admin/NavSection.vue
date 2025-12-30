<!-- resources/js/Components/Admin/NavSection.vue -->
<template>
  <div class="mt-8 first:mt-0">
    <h3
      v-if="title"
      class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3"
    >
      {{ title }}
    </h3>
    <div class="space-y-1">
      <slot />
    </div>
  </div>
</template>

<script setup>
defineProps({
  title: String
})
</script>

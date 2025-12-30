<!-- resources/js/Components/Admin/NavSection.vue -->
<template>
  <div class="mt-6 first:mt-0">
    <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">
      {{ title }}
    </h3>
    <div class="mt-2 space-y-1">
      <slot />
    </div>
  </div>
</template>

<script setup>
defineProps({
  title: String
})
</script>

<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";


const props = defineProps({
  projects: {
    type: Array,
    required: false,
  }
});


</script>

<template>
  <AppLayout>
    <div class="p-4">
      <h1 class="text-xl font-bold mb-4">Project List</h1>
      <table class="w-full border-collapse border border-gray-300">
        <thead>
        <tr>
          <th class='border border-gray-300 p-2'>Name</th>
          <th class='border border-gray-300 p-2'>Description</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="project in projects" :key="project.id">
          <td class='border border-gray-300 p-2'>{{ project.name }}</td>
          <td class='border border-gray-300 p-2'>{{ project.description }}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </AppLayout>
</template>

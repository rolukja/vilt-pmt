<script setup>
import { router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
  items: Array,
});

const createNew = () => {
  router.visit(route('task.create'));
};

const edit = (id) => {
  router.visit(route('task.edit', id));
};

const remove = (id) => {
  if (confirm('Are you sure you want to delete this task?')) {
    router.delete(route('task.destroy', id));
  }
};
</script>

<template>
    <AppLayout>
      <div class="p-4">
        <h1 class="text-xl font-bold mb-4">Task List</h1>
        <button @click="createNew" class="mb-4 p-2 bg-green-500 text-white rounded">Create New</button>
        <table class="w-full border-collapse border border-gray-300">
          <thead>
          <tr>
            <th class="border border-gray-300 p-2">ID</th>
            <th class="border border-gray-300 p-2">Name</th>
            <th class="border border-gray-300 p-2">Description</th>
            <th class="border border-gray-300 p-2">Actions</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="item in items" :key="item.id">
            <td class="border border-gray-300 p-2">{{ item.id }}</td>
            <td class="border border-gray-300 p-2">{{ item.name }}</td>
            <td class="border border-gray-300 p-2">{{ item.description }}</td>
            <td class="border border-gray-300 p-2">
              <button @click="edit(item.id)" class="mr-2 p-1 bg-yellow-500 text-white rounded">Edit</button>
              <button @click="remove(item.id)" class="p-1 bg-red-500 text-white rounded">Delete</button>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </AppLayout>
</template>

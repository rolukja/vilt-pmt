<script setup>
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Multiselect from 'vue-multiselect';
import 'vue-multiselect/dist/vue-multiselect.min.css';

const props = defineProps({
  data: Object,
});

const form = reactive({
      id: props.data?.id || null,
  name: props.data?.name || '',
  description: props.data?.description || '',

});

const submit = () => {
  if (form.id) {
    router.put(route('task.update', form.id), form);
  } else {
    router.post(route('task.store'), form);
  }
};
</script>

<template>
  <AppLayout>
      <div class="p-4">
        <h1 class="text-xl font-bold mb-4">{{ form.id ? 'Edit Task' : 'Create New Task' }}</h1>
        <form @submit.prevent="submit">
          <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input v-model="form.name" type="text" class="w-full p-2 border border-gray-300 rounded" required />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700">Description</label>
            <textarea v-model="form.description" class="w-full p-2 border border-gray-300 rounded" required></textarea>
          </div>
          <button type="submit" class="p-2 bg-blue-500 text-white rounded">
            {{ form.id ? 'Update' : 'Create' }}
          </button>
        </form>
      </div>
  </AppLayout>
</template>

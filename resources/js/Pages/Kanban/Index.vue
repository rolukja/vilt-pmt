<script setup>
import {ref, computed, onMounted} from "vue";
import {Container, Draggable} from "vue-dndrop";
import AppLayout from "@/Layouts/AppLayout.vue";

// Props
const props = defineProps({
  colWidth: {type: [Number, String], default: 300},
  colMinWidth: {type: [Number, String], default: 180},
  colMaxWidth: {type: [Number, String], default: 330},
  colBgColor: {type: String, default: "#f8f8f8"},
  countText: {type: String, default: "Tasks"},
});

// Emits
const emit = defineEmits(["item-dropped", "status-change", "drag"]);

// Reactive State
const loading = ref(true);
const sourceContainerIndex = ref(null);
const kanbanColumns = ref([]);

// Computed Styles
const columnStyle = computed(() => `width: ${props.colWidth}px; min-width: ${props.colMinWidth}px; max-width: ${props.colMaxWidth}px;`);
const contentStyle = computed(() => `background-color: ${props.colBgColor}`);

// Methoden
const fetchKanbanData = async () => {
  try {
    // Simulierte API-Anfrage (JSON-Daten lokal einbinden oder API nutzen)
    // const response = await fetch("/data.json");
    // const data = await response.json();

    const data = [
      {
        "id": 1,
        "name": "To Do",
        "status": "todo",
        "columnItems": [
          {"id": 101, "title": "Task 1", "status": "todo"},
          {"id": 102, "title": "Task 2", "status": "todo"}
        ]
      },
      {
        "id": 2,
        "name": "In Progress",
        "status": "in_progress",
        "columnItems": [
          {"id": 103, "title": "Task 3", "status": "in_progress"}
        ]
      },
      {
        "id": 3,
        "name": "Done",
        "status": "done",
        "columnItems": [
          {"id": 104, "title": "Task 4", "status": "done"}
        ]
      }
    ];

    kanbanColumns.value = data;
  } catch (error) {
    console.error("Fehler beim Laden der Kanban-Daten:", error);
  } finally {
    loading.value = false;
  }
};

const dropAction = (arr, dragResult, column) => {
  const {removedIndex, addedIndex, payload} = dragResult;
  const {status} = column;
  if (removedIndex === null && addedIndex === null) return arr;

  const items = [...arr];
  let itemToAdd = payload;

  if (removedIndex !== null) {
    itemToAdd = items.splice(removedIndex, 1)[0];
  }
  if (addedIndex !== null) {
    items.splice(addedIndex, 0, itemToAdd);
    emit("status-change", {item: payload, newStatus: status});
  }
  return items;
};

const onDrop = (index, dropResult, column) => {
  kanbanColumns.value[index].columnItems = dropAction(
      kanbanColumns.value[index].columnItems,
      dropResult,
      column
  );
};

const getDraggedItem = (item, index) => {
  sourceContainerIndex.value = index;
  return kanbanColumns.value[index].columnItems[item];
};

const countValue = (column) => column.columnItems.length;

// Daten bei Mount abrufen
onMounted(fetchKanbanData);
</script>

<template>

  <AppLayout>
    <div class="flex w-full h-full select-none">
      <template v-if="!loading">
        <div
            v-for="(column, index) in kanbanColumns"
            :key="column.id"
            class="flex-1 h-fit p-3 bg-white border border-gray-300 rounded-md mx-2"
            :style="columnStyle"
        >
          <div class="p-2 bg-white font-bold">
            <h3 class="text-lg">{{ column.name }}</h3>
            <p class="text-sm text-gray-600">
              {{ countValue(column, index) }} {{ countText }}
            </p>
          </div>

          <div class="p-2" :style="contentStyle">
            <Container
                group-name="kanban"
                :get-child-payload="(event) => getDraggedItem(event, index)"
                @drop="onDrop(index, $event, column)"
                @drag-start="sourceContainerIndex = index; emit('drag')"
            >
              <Draggable
                  v-for="(item, indice) in column.columnItems"
                  :key="item.id"
              >
                <div class="p-3 my-2 bg-white border border-gray-300 rounded shadow cursor-grab">
                  <span>{{ item.title }}</span>
                </div>
              </Draggable>
            </Container>
          </div>
        </div>
      </template>

      <div v-else class="p-5 text-xl text-center">
        Lade Kanban-Daten...
      </div>
    </div>
  </AppLayout>
</template>

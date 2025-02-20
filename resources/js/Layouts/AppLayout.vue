<script setup>
import {ref, onMounted, onBeforeUnmount} from "vue";
import {Link, usePage} from '@inertiajs/vue3';

// Zustände für Sidebar und Mobile-Check
const isSidebarOpen = ref(true);
const isMobile = ref(false);
const page = usePage();
const auth = page.props?.auth || {};
console.log(auth);


// Funktion zum Ein-/Ausblenden der Sidebar
const toggleSidebar = () => {
  isSidebarOpen.value = !isSidebarOpen.value;
};

// Funktion zur Überprüfung der Bildschirmgröße
const checkMobile = () => {
  isMobile.value = window.innerWidth < 768; // MD breakpoint in Tailwind
  if (isMobile.value) {
    isSidebarOpen.value = false;
  } else {
    isSidebarOpen.value = true;
  }
};

// Funktion zum Schließen der Sidebar bei Klick außerhalb
const closeSidebarOnClickOutside = (event) => {
  const sidebar = document.querySelector(".sidebar"); // Sidebar-Element
  const hamburgerIcon = document.querySelector(".hamburger-icon"); // Hamburger-Icon

  // Schließe die Sidebar, wenn der Klick außerhalb der Sidebar und nicht auf dem Hamburger-Icon erfolgt
  if (
      isMobile.value &&
      isSidebarOpen.value &&
      !sidebar.contains(event.target) &&
      !hamburgerIcon.contains(event.target)
  ) {
    isSidebarOpen.value = false;
  }
};

// Event-Listener für Resize-Events und Klicks
onMounted(() => {
  checkMobile();
  window.addEventListener("resize", checkMobile);
  document.addEventListener("click", closeSidebarOnClickOutside);
});

// Event-Listener entfernen, bevor die Komponente zerstört wird
onBeforeUnmount(() => {
  window.removeEventListener("resize", checkMobile);
  document.removeEventListener("click", closeSidebarOnClickOutside);
});


const links = [
  {name: "Projects", href: route('project.index')},
];

if (auth.isAdmin) {
  links.push({ name: "Admin", href: route('admin.overview.index') });
}


</script>

<template>
  <div class="min-h-screen flex">
    <!-- Sidebar -->
    <div
        :class="{
        'transform -translate-x-full': !isSidebarOpen && isMobile,
        'transition-transform duration-300 ease-in-out': true,
      }"
        class="sidebar w-64 bg-gray-800 text-white fixed h-screen"
    >
      <div class="p-4">
        <h1 class="text-lg font-bold">PMT</h1>
      </div>
      <nav class="mt-4">
        <Link v-for="link in links" :key="link.name"
              :href="link.href" class="block p-2 hover:bg-gray-700">{{ link.name }}
        </Link>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 ml-0 md:ml-64">
      <!-- Header with Hamburger Icon -->
      <header class="bg-white shadow p-4">
        <button
            @click="toggleSidebar"
            class="hamburger-icon text-gray-600 focus:outline-none"
        >
          <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
          >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
            />
          </svg>
        </button>
      </header>

      <!-- Main Content Area -->
      <main class="p-4">
        <slot/>
      </main>
    </div>
  </div>
</template>
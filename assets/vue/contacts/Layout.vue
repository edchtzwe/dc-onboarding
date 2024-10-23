<template>
    <div class="container mt-4">
      <!-- Conditionally render IndexFilter and IndexTable or ContactForm -->
      <IndexFilter v-if="showTable" />
      <IndexTable v-if="showTable" @editContact="showEditForm" @createContact="showCreateForm" />
  
      <ContactForm v-else @go-back="showTableView" />
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import { useContactsStore } from './stores/contacts';
  import IndexFilter from './IndexFilter.vue';
  import IndexTable from './IndexTable.vue';
  import ContactForm from './ContactForm.vue';
  
  // Store reference to manage view
  const showTable = ref(true);
  
  // Reference to the Contacts store
  const contactsStore = useContactsStore();
  
  // Handle fetching contacts when component is mounted
  onMounted(() => {
    contactsStore.fetchContacts();
  });
  
  // Methods to control component view switching
  const showEditForm = () => {
    showTable.value = false;
  };
  
  const showCreateForm = () => {
    showTable.value = false;
  };
  
  const showTableView = () => {
    showTable.value = true;
  };
  </script>
  
  <style scoped>
  .container {
    margin-top: 20px;
  }
  </style>
  
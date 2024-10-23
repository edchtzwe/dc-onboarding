<template>
    <div class="container mt-4">
      <IndexFilter />
      <IndexTable />
    </div>
  </template>
  
  <script setup>
  import { onMounted } from 'vue';
  import { useContactsStore } from './stores/contacts';
  import IndexFilter from './IndexFilter.vue';
  import IndexTable from './IndexTable.vue';
  
  const contactsStore = useContactsStore();
  
  onMounted(() => {
    contactsStore.fetchContacts();
  });
  </script>
  
  <style scoped>
  .container {
    margin-top: 20px;
  }
  </style>
  
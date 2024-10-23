<template>
    <div class="row mb-3">
      <div class="col-md-8">
        <input
          type="text"
          class="form-control"
          placeholder="Filter Contacts"
          v-model="filter"
          @input="applyFilter"
        />
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, watch } from 'vue';
  import { useContactsStore } from './stores/contacts';
  
  const contactsStore = useContactsStore();
  const filter = ref('');
  
  const applyFilter = () => {
    contactsStore.filteredContacts = contactsStore.contacts.filter((contact) =>
      contact.name.toLowerCase().includes(filter.value.toLowerCase())
    );
  };
  
  watch(filter, applyFilter);
  </script>
  
  <style scoped>
  .form-control {
    margin-bottom: 16px;
  }
  </style>
  
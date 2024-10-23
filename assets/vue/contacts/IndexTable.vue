<template>
    <div class="card">
      <div class="card-header">Contacts</div>
      <div class="card-body p-0">
        <table class="table table-striped mb-0">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="contact in contactsStore.contacts" :key="contact.id">
              <td>{{ contact.firstName }} {{ contact.lastName }}</td>
              <td>{{ contact.email }}</td>
              <td class="text-end">
                <button class="btn btn-sm btn-outline-primary me-2" @click="editContact(contact)">
                  Edit
                </button>
                <button class="btn btn-sm btn-outline-danger" @click="deleteContact(contact)">
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>
  
  <script setup>
  import { useContactsStore } from './stores/contacts';
  import axios from 'axios';
  
  const contactsStore = useContactsStore();
  
  const editContact = (contact) => {
    console.log('Edit contact:', contact);
  };
  
  const deleteContact = async (contact) => {
    try {
      await axios.delete(`/api/contacts/${contact.id}`);
      contactsStore.fetchContacts();
    } catch (error) {
      console.error('Error deleting contact:', error);
    }
  };
  </script>
  
  <style scoped>
  .table-actions {
    display: flex;
    justify-content: flex-end;
  }
  </style>
  
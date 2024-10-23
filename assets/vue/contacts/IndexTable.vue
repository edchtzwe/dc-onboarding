<template>
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <span>Contacts</span>
        <button class="btn btn-success" @click="createContact">Create New Contact</button>
      </div>
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
  
  // Define emits directly using Vue's compiler macro
  const emit = defineEmits(['editContact', 'createContact']);
  
  // Get the contacts store
  const contactsStore = useContactsStore();
  
  // Edit contact function
  const editContact = (contact) => {
    // Emit the event to notify parent about the edit
    emit('editContact', contact);
  };
  
  // Create contact function
  const createContact = () => {
    // Emit the event to notify parent to switch to ContactForm for creating a new contact
    emit('createContact');
  };
  
  // Delete contact function
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
  
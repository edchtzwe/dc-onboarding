import { defineStore } from 'pinia';
import { ref } from 'vue';
import axios from 'axios';

export const useContactsStore = defineStore('contacts', () => {
  const contacts = ref([]);
  
  // Fetch contacts from the backend
  const fetchContacts = async () => {
    try {
      const url = window.Routing.generate('fetch_contacts');
      const response = await axios.get(url);
      contacts.value = response.data;
    }
    catch (error) {
      console.error('Error fetching contacts:', error);
    }
  };

  return { contacts, fetchContacts };
});

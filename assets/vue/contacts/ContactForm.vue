<template>
    <div class="card contact-form shadow-sm mt-4">
      <div class="card-header bg-primary text-white">
        <h2 class="h5 mb-0">Edit Contact</h2>
      </div>
      <form class="card-body">
        <div class="mb-3">
          <p class="text-muted">Under Construction</p>
        </div>
  
        <div class="d-flex justify-content-between mt-4">
          <!-- Back Button -->
          <button type="button" @click="goBack" class="btn btn-outline-secondary">
            Back
          </button>
  
          <!-- Submit Button (disabled for now) -->
          <button type="submit" class="btn btn-primary" disabled>
            Submit
          </button>
        </div>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    name: 'ContactForm',
    methods: {
      goBack() {
        // Emit an event to notify parent to change view back to Layout.vue
        this.$emit('go-back');
      }
    }
  };
  </script>
  
  <style scoped>
  .contact-form {
    max-width: 600px;
    margin: 0 auto;
  }
  
  .card-header {
    text-transform: uppercase;
    font-weight: bold;
  }
  
  .btn-primary:disabled {
    opacity: 0.65;
    cursor: not-allowed;
  }
  </style>
  
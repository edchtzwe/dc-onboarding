import { createApp } from 'vue';
import { createPinia } from 'pinia';
import App from './Layout.vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

const pinia = createPinia();

createApp(App).use(pinia).mount('#app');

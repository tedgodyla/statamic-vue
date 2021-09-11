import { createApp } from 'vue'
import App from './App.vue'
import getRouter from './router'
import store from './store'

import { fetchRoutes } from './services/api';

fetchRoutes().then(res => {
  const router = getRouter(res);
  createApp(App).use(store).use(router).mount('#app')
});
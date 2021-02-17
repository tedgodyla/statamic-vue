import { createApp } from 'vue';
import App from './components/App'

const app = createApp(App);

window.App = app;

app.mount('#app');
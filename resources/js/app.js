import './bootstrap';

import {createApp} from 'vue';
import App from './layouts/App.vue'
import store from './store/index.js'
import router from './routes/index.js';

const app = createApp(App)
// app.config.devtools = true
app.use(router)
app.use(store)
app.mount('#app')
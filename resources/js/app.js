import { createApp } from "vue";
import 'bootstrap';
import Welcome from "./Welcome.vue";


const app = createApp({});
app.component('welcome', Welcome);

app.mount('#app');


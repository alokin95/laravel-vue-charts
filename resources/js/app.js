import Vue from 'vue';
import { router } from './helpers/router';

//Main component
import App from "./components/App";

new Vue({
    router,
    // render: h => h(App)
}).$mount('#app');

import Vue from 'vue';
import { router } from './_helpers/router';
import VeeValidate from 'vee-validate';

//Main component
import App from "./components/App";

Vue.use(VeeValidate);

window.Event = new Vue();

new Vue({
    router,
    // render: h => h(App)
}).$mount('#app');

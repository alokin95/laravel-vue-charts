import Vue from 'vue';
import { router } from './_helpers/router';
import VeeValidate from 'vee-validate';
import 'vue2-datepicker/index.css';
import Donut from 'vue-css-donut-chart';
import 'vue-css-donut-chart/dist/vcdonut.css';
//Main component
import App from "./components/App";

Vue.use(VeeValidate);
Vue.use(Donut);

window.Event = new Vue();

new Vue({
    router,
    // render: h => h(App)
}).$mount('#app');

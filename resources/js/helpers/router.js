import Router from 'vue-router';
import Vue from "vue";
import LoginPage from "../components/LoginPage";

Vue.use(Router);

export const router = new Router({
    mode: 'history',
    routes: [
        //Global routes
        {
            path: '/',
            component: LoginPage
        },

        //redirect to home
        { path: '*', redirect: '/' }
    ]
});

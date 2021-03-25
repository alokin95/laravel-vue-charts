import Router from 'vue-router';
import Vue from "vue";
import LoginPage from "../components/LoginPage";
import App from "../components/App";

Vue.use(Router);

export const router = new Router({
    mode: 'history',
    routes: [
        //Global routes
        {
            path: '/',
            component: LoginPage
        },
        //Protected routes
        {
            path: '/reports',
            component: App
        },

        //redirect to home
        { path: '*', redirect: '/' }
    ]
});

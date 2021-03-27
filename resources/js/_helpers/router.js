import { authenticationService } from '../_services/authentication.service';

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
            component: App,
            meta: { authorize: true }
        },

        //redirect to home
        { path: '*', redirect: '/' }
    ]
});

router.beforeEach((to, from, next) => {
    // redirect to login page if not logged in and trying to access a restricted page
    const { authorize } = to.meta;
    const currentUser = authenticationService.currentUserValue;

    if (authorize) {
        if (!currentUser) {
            // not logged in so redirect to login page with the return url
            authenticationService.logout();
            return next({ path: '/', query: { returnUrl: to.path } });
        }

        if (!currentUser.access_token) {
            //no token in localstorage so redirect to login with return url
            authenticationService.logout();
            return next({ path: '/', query: { returnUrl: to.path } });
        }
    }

    next();
})

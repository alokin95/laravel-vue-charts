<template>
    <div class="container mx-auto">
        <div class="flex items-center justify-center h-screen">
            <div class="font-bold">
                <form class="w-full max-w-sm" @submit.prevent="">
                    <div class="md:flex md:items-center mb-4">
                        <div>
                            <input v-model="login.username" class="text-center shadow-xl appearance-none border-2 border-loginBorders rounded-full w-full py-2 px-4 text-loginInputText leading-tight focus:outline-none" id="username" type="text" placeholder="Username">
                        </div>
                    </div>
                    <div class="flex items-center mb-4 relative">
                        <div>
                            <input v-model="login.password" :type="showPassword ? 'text' : 'password'" class="shadow-xl text-center appearance-none border-2 border-loginBorders rounded-full w-full py-2 px-4 text-loginInputText leading-tight focus:outline-none" id="inline-password" placeholder="Password">
                        </div>
                        <i @click="togglePasswordVisibility" class="fa fa-eye see-password-icon absolute"></i>
                    </div>
                    <div class="md:flex md:items-center mb-4">
                        <button @click="submitLogin" type="submit" class="text-center shadow-xl bg-loginButton appearance-none border-2 border-loginButton rounded-full w-full py-2 px-4 text-loginButtonText leading-tight focus:outline-none">
                            Login
                        </button>
                    </div>
                    <div class="text-center m-auto relative">
                        <i @click="toggleInformationPopup" style="font-size: 24px;" class="fa fa-info-circle text-loginInfoButton"></i>
                        <div v-show="showInformationPopup" class="popup">
                            <div class="inner">
                                <div>Username: admin</div>
                                <div>Password: admin</div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {authenticationService} from "../_services/authentication.service";

export default {
    name: "LoginPage",

    data() {
        return {
            showPassword: false,
            showInformationPopup: false,
            login: {
                username: "",
                password: ""
            },
            returnUrl: '/reports'
        }
    },

    created() {
        if (authenticationService.currentUserValue) {
            return this.$router.push('/reports')
        }

        this.returnUrl = this.$route.query.returnUrl || '/reports';
    },

    methods: {
        submitLogin() {
            authenticationService.login(this.login.username, this.login.password)
                .then(response => {
                    this.$router.push(this.returnUrl);
                });
        },

        togglePasswordVisibility() {
            this.showPassword = !this.showPassword;
        },

        toggleInformationPopup() {
            this.showInformationPopup = !this.showInformationPopup;
        }
    }
}
</script>

<style scoped>
.see-password-icon {
    float: right;
    right: 10px;
    font-size: 15px;
    cursor: pointer;
}

.fa-info-circle {
    cursor: pointer;
}

.popup {
    position: absolute;
    left: 0;
    top: -60px;
    transform: translate3d(0, -50%, 0);
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
    background: none;
    border-radius: 100px;
    width: 100%;
}

.popup:after {
    content: "";
    width: 20px;
    height: 20px;
    transform: rotate(-45deg);
    background: #fff;
    position: absolute;
    box-shadow: 1px 4px 8px rgba(0, 0, 0, 0.5);
    z-index: -1;
    bottom: -10px;
    left: calc(50% - 10px);
}

.inner {
    padding: 30px 0;
    background: #fff;
    border-radius: 100px;
}
</style>

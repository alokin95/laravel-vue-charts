<template>
    <div class="flex items-center justify-center h-screen">
        <div class="font-bold">
            <form class="w-full max-w-sm">
                <div class="md:flex md:items-center mb-4">
                    <div>
                        <input class="text-center shadow-xl appearance-none border-2 border-loginBorders rounded-full w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" id="username" type="text" placeholder="Username">
                    </div>
                </div>
                <div class="flex items-center mb-4 relative">
                    <div>
                        <input class="shadow-xl text-center appearance-none border-2 border-loginBorders rounded-full w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" id="inline-password" type="password" placeholder="Password">
                    </div>
                    <i class="fa fa-eye see-password-icon absolute"></i>
                </div>
                <div class="md:flex md:items-center mb-4">
                    <button class="text-center shadow-xl bg-loginButton appearance-none border-2 border-loginButton rounded-full w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" type="button">
                        Login
                    </button>
                </div>
                <div class="text-center m-auto">
                    <i style="font-size: 24px;" class="fa fa-info-circle text-loginInfoButton"></i>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "LoginPage"
}
</script>

<style scoped>
.see-password-icon {
    float: right;
    right: 10px;
    font-size: 15px;
}
</style>

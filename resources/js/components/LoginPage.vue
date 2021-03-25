<template>
    <div class="flex items-center justify-center h-screen">
        <div class="font-bold">
            <form class="w-full max-w-sm">
                <div class="md:flex md:items-center mb-6">
                    <div>
                        <input class="text-center shadow-xl appearance-none border-2 border-blue-600 rounded-full w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" id="username" type="text" placeholder="Username">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div>
                        <input class="shadow-xl text-center appearance-none border-2 border-blue-600 rounded-full w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" id="inline-password" type="password" placeholder="Password">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <button class="text-center shadow-xl bg-loginButton appearance-none border-2 border-loginButton rounded-full w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" type="button">
                        Login
                    </button>
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

</style>

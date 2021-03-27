<template>
    <div class="lg:flex">
        <div class="w-full bg-sidebarLeft flex-1 lg:h-screen lg:p-0 p-6">

        </div>
        <div class="flex-12 w-full">
            <Header></Header>
        </div>
    </div>
</template>

<script>
import Header from "./partials/Header";

export default {
    name: "App",
    components: {Header}
}
</script>

<style scoped>

</style>

<template>
    <div class="lg:flex">

        <!--    Left start   -->
        <div class="w-full bg-sidebarLeft flex-1 lg:h-screen lg:p-0 p-6">

        </div>
        <!--    Left end   -->

        <!--    Right start   -->
        <div class="flex-12 w-full lg:h-screen">
            <Header></Header>

            <div class="bg-mainContent" style="height: 1000px;">
                <div class="w-11/12 m-auto">
                </div>
            </div>
        </div>
        <!--    Right end   -->

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

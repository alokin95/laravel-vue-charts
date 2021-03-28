<template>
    <div class="lg:flex">

        <!--    Left start   -->
        <div class="w-full bg-sidebarLeft flex-1 lg:h-screen lg:p-0 p-6">

        </div>
        <!--    Left end   -->

        <!--    Right start   -->
        <div class="flex-12 w-full lg:h-screen">
            <Header></Header>

            <div class="bg-mainContent p-4">
                <div class="w-full h-5 bg-blue-900 mb-4">
                    HGw Info
                </div>
                <Charts v-if="showCharts"></Charts>
            </div>
        </div>
        <!--    Right end   -->

    </div>
</template>

<script>
import Header from "./partials/Header";
import Charts from "./partials/Charts";

export default {
    name: "App",
    components: {Charts, Header},

    data() {
        return {
            showCharts: true,
            showTables: false
        }
    },

    mounted() {
    }
}
</script>

<style scoped>

</style>

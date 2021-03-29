<template>
    <div class="lg:flex lg:h-screen bg-mainContent">

        <!--    Left start   -->
        <div class="w-full bg-sidebarLeft flex-1 lg:h-screen lg:p-0 p-6">

        </div>
        <!--    Left end   -->

        <!--    Right start   -->
        <div class="flex-12 w-full lg:h-screen">
            <Header></Header>

            <div class="bg-mainContent p-4">
                <div class="w-full h-5 mb-4 text-right">
                    HGw Info
                </div>

                <Charts v-show="showCharts"></Charts>
                <Tables v-show="showTables"></Tables>
            </div>
        </div>
        <!--    Right end   -->

    </div>
</template>

<script>
import Header from "./partials/Header";
import Charts from "./partials/Charts";
import Tables from "./partials/Tables";

export default {
    name: "App",

    components: {
        Charts,
        Header,
        Tables
    },

    data() {
        return {
            showCharts: false,
            showTables: false
        }
    },

    mounted() {
        let self = this;
        Event.$on('report-created', function (data) {
            if (!self.showCharts && !self.showTables) {
                self.showCharts = true;
            }
        })

        Event.$on('show-tables', function () {
            self.showTables = true;
            self.showCharts = false;
        })

        Event.$on('show-charts', function () {
            self.showCharts = true;
            self.showTables = false;
        })

        Event.$on('reset-filters', function () {
            self.showCharts = false;
            self.showTables = false;
        })
    }
}
</script>

<style scoped>

</style>

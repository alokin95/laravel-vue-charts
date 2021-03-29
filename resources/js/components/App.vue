<template>
    <div class="lg:flex lg:min-h-full bg-mainContent relative">

        <div v-if="downloading" class="spinner absolute h-screen w-full bg-white z-50 opacity-40">
            <div class="loader top-1/2">Loading...</div>
        </div>
        <!--    Left start   -->
        <div class="w-full bg-sidebarLeft flex-1 lg:min-h-screen lg:p-0 p-6">

        </div>
        <!--    Left end   -->

        <!--    Right start   -->
        <div class="flex-12 w-full">
            <Header></Header>

            <div class="bg-mainContent p-4">
                <div v-show="showTables || showCharts" class="w-full mb-4 text-right">
                    <button class="lg:w-1/12 lg:float-right text-center appearance-none border-2 border-black rounded-full w-1/3 py-2 px-4 text-loginButtonText leading-tight focus:outline-none" >
                        HGw Info
                    </button>
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
            downloading: false,
            showCharts: false,
            showTables: false,
            showInfo: false,
            info: null
        }
    },

    mounted() {
        let self = this;

        Event.$on('report-created', function (data) {
            if (!self.showCharts && !self.showTables) {
                self.showCharts = true;
            }
            self.info = data;
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

        Event.$on('download-start', function () {
            self.downloading = true;
        });

        Event.$on('download-end', function () {
            self.downloading = false;
        });
    }
}
</script>

<style scoped>
.loader,
.loader:before,
.loader:after {
    border-radius: 50%;
}
.loader {
    color: #ffffff;
    font-size: 11px;
    text-indent: -99999em;
    margin: 55px auto;
    position: relative;
    width: 10em;
    height: 10em;
    box-shadow: inset 0 0 0 1em;
    -webkit-transform: translateZ(0);
    -ms-transform: translateZ(0);
    transform: translateZ(0);
}
.loader:before,
.loader:after {
    position: absolute;
    content: '';
}
.loader:before {
    width: 5.2em;
    height: 10.2em;
    background: #0dc5c1;
    border-radius: 10.2em 0 0 10.2em;
    top: -0.1em;
    left: -0.1em;
    -webkit-transform-origin: 5.1em 5.1em;
    transform-origin: 5.1em 5.1em;
    -webkit-animation: load2 2s infinite ease 1.5s;
    animation: load2 2s infinite ease 1.5s;
}
.loader:after {
    width: 5.2em;
    height: 10.2em;
    background: #0dc5c1;
    border-radius: 0 10.2em 10.2em 0;
    top: -0.1em;
    left: 4.9em;
    -webkit-transform-origin: 0.1em 5.1em;
    transform-origin: 0.1em 5.1em;
    -webkit-animation: load2 2s infinite ease;
    animation: load2 2s infinite ease;
}
@-webkit-keyframes load2 {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
@keyframes load2 {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}

</style>

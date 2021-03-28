<template>
    <div class="lg:flex p-4">

        <div class="lg:flex-1">
            <line-chart :chart-data="rssData"></line-chart>
        </div>

        <div class="lg:flex-1">

        </div>

    </div>
</template>

<script>
import LineChart from "./LineChart";

export default {
    components: {
        LineChart
    },
    data () {
        return {
            rssData: {}
        }
    },
    mounted () {
        Event.$on('report-created', function(response) {
            console.log(response);
        })
        this.fillData()
    },
    methods: {
        fillData () {
            this.rssData = {
                labels: [12, 13],
                datasets: [
                    {
                        label: 'Data One',
                        data: [17, 1]
                    },
                ]
            }
        },
    }
}
</script>

<style>

</style>

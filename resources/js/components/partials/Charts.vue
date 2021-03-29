<template>
    <div>
        <div class="lg:flex p-4">

            <div class="lg:flex-1 lg:m-0">
                <line-chart class="h-60" :chart-data="rssData" :options="chartOptions"></line-chart>
            </div>

            <div class="lg:flex-1">
                <line-chart class="h-60" :chart-data="interferenceData" :options="chartOptions"></line-chart>
            </div>

        </div>

        <div class="lg:flex p-4">

            <div class="lg:flex-1 lg:m-0">
                <line-chart class="h-60" :chart-data="bitrateData" :options="chartOptions"></line-chart>
            </div>

            <div class="lg:flex-1">

            </div>

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
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false
            },
            rssData: {},
            interferenceData: {},
            bitrateData: {}
        }
    },
    mounted () {
        let self = this;
        Event.$on('report-created', function(response) {
            self.fillData(response)
        })
    },
    methods: {
        fillData(data) {
            this.rssData = this.fillChartData(data.rss, 'HGw - RSS');
            this.interferenceData = this.fillChartData(data.interference, 'HGW Interference');
            this.bitrateData = this.fillChartData(data.bitrate, 'HGw Bitrate');
        },

        fillChartData (data, label) {
            return {
                labels: data.map(d => Date.parse(d.created_at)),
                datasets: [
                    {
                        label: label,
                        data: data.map(d => d.value)
                    },
                ]
            }
        },
    }
}
</script>

<style>

</style>

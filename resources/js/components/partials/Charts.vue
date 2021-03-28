<template>
    <div class="lg:flex p-4">

        <div class="lg:flex-1">
            <line-chart class="h-60" :chart-data="rssData" :options="chartOptions"></line-chart>
        </div>

        <div class="lg:flex-1">
            <line-chart :chart-data="rssData"></line-chart>
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
            rssData: {}
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
            this.fillRssData(data.rss);
        },

        fillRssData (rssData) {
            this.rssData = {
                labels: rssData.map(rss => rss.created_at),
                datasets: [
                    {
                        label: 'HGw - RSS',
                        data: rssData.map(rss => rss.value)
                    },
                ]
            }
        },
    }
}
</script>

<style>

</style>

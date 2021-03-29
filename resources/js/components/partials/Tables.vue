<template>
    <div class="lg:flex p-4">

        <div class="lg:flex-1 lg:mr-2">

            <div class="flex bg-white shadow-xl justify-between rounded p-4 mb-4">
                <span class="font-medium text-blue-800">Overall Status</span>
                <span class="w-2/6 tag is-warning">Medium</span>
            </div>

            <div class="flex bg-white shadow-xl justify-between rounded p-4 mb-4">
                <span class="font-medium text-blue-800">RSS Status</span>
                <span class="w-2/6 tag is-danger">Bad</span>
            </div>

            <div class="flex bg-white shadow-xl justify-between rounded p-4 mb-4">
                <span class="font-medium text-blue-800">Client RSS Status</span>
                <span class="w-2/6 tag is-warning">Medium</span>
            </div>

            <div class="flex bg-white shadow-xl justify-between rounded p-4 mb-4">
                <span class="font-medium text-blue-800">Sticky Client Status</span>
                <span class="w-2/6 tag is-success">Good</span>
            </div>

            <div class="flex bg-white shadow-xl justify-between rounded p-4">
                <span class="font-medium text-blue-800">Interference status - overall</span>
                <span class="w-2/6 tag is-warning">Medium</span>
            </div>
            <div class="flex bg-white shadow-xl justify-between rounded p-4">
                <span class="font-medium text-blue-800">Interference status Co- Channel</span>
                <span class="w-2/6 tag is-success">Good</span>
            </div>
            <div class="flex bg-white shadow-xl justify-between rounded p-4">
                <span class="font-medium text-blue-800">Sticky Client Status</span>
                <span class="w-2/6 tag is-danger">Bad</span>
            </div>

            <div class="flex bg-white shadow-xl justify-between rounded p-4 mb-4 mt-4">
                <span class="font-medium text-blue-800">Total number of clients</span>
                <span>231</span>
            </div>

            <div class="flex bg-white shadow-xl justify-between rounded p-4 mb-4 mt-4">
                <span class="font-medium text-blue-800">Max number of concurent clients</span>
                <span>45</span>
            </div>

            <div class="flex bg-white shadow-xl justify-between rounded p-4">
                <span class="font-medium text-blue-800">HGw Number of clients</span>
                <span>57</span>
            </div>
            <div class="flex bg-white shadow-xl justify-between rounded p-4">
                <span class="font-medium text-blue-800">HGw Number of sticky clients</span>
                <span>22</span>
            </div>
            <div class="flex bg-white shadow-xl justify-between rounded p-4 mb-4">
                <span class="font-medium text-blue-800">Data transfered [GB]</span>
                <span>120</span>
            </div>

        </div>

        <div class="lg:flex-1 lg:mr-2">

            <div class="bg-white shadow-xl mb-4">
                <h1 class="text-blue-800 font-medium p-4">HGw Bitrate [Mbps]</h1>
                <table class="table w-full p-4">
                    <thead>
                    <tr>
                        <th><abbr title="KPI Name">KPI Name</abbr></th>
                        <th><abbr title="Min">Min</abbr></th>
                        <th><abbr title="Avg">Avg</abbr></th>
                        <th><abbr title="Max">Max</abbr></th>
                        <th><abbr title="Last">Last</abbr></th>
                    </tr>
                    </thead>
                    <tbody class="bg-mainContent">
                    <tr class="bg-mainContent">
                        <td>Bitrate</td>
                        <td>76</td>
                        <td>−49</td>
                        <td>17</td>
                        <td>sada></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="bg-white shadow-xl mb-4">
                <h1 class="text-blue-800 font-medium p-4">HGw Bitrate [Mbps]</h1>
                <table class="table w-full p-4">
                    <thead>
                    <tr>
                        <th><abbr title="KPI Name">KPI Name</abbr></th>
                        <th><abbr title="Min">Min</abbr></th>
                        <th><abbr title="Avg">Avg</abbr></th>
                        <th><abbr title="Max">Max</abbr></th>
                        <th><abbr title="Last">Last</abbr></th>
                    </tr>
                    </thead>
                    <tbody class="bg-mainContent">
                    <tr class="bg-mainContent">
                        <td>27</td>
                        <td>76</td>
                        <td>−49</td>
                        <td>17</td>
                        <td>sada></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="bg-white shadow-xl mb-4">
                <h1 class="text-blue-800 font-medium p-4">HGw Bitrate [Mbps]</h1>
                <table class="table w-full p-4">
                    <thead>
                    <tr>
                        <th><abbr title="KPI Name">KPI Name</abbr></th>
                        <th><abbr title="Min">Min</abbr></th>
                        <th><abbr title="Avg">Avg</abbr></th>
                        <th><abbr title="Max">Max</abbr></th>
                        <th><abbr title="Last">Last</abbr></th>
                    </tr>
                    </thead>
                    <tbody class="bg-mainContent">
                    <tr class="bg-mainContent">
                        <td>27</td>
                        <td>76</td>
                        <td>−49</td>
                        <td>17</td>
                        <td>sada></td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="lg:flex-1 lg:mr-2">

            <div class="bg-white shadow-xl p-4 mb-4">
                <h1 class="text-blue-800 w-1/2 m-auto text-xl">HGw Channel</h1>
                <vc-donut :size="130" :sections="sections" :thickness="50" has-legend legend-placement="left">46%</vc-donut>
            </div>

            <div class="bg-white shadow-xl p-4 mb-4">
                <h1 class="text-blue-800 w-1/2 m-auto text-xl">HGw Channel</h1>
                <vc-donut :size="130" :sections="sections" :thickness="50" has-legend legend-placement="left">46%</vc-donut>
            </div>

            <div class="bg-white shadow-xl p-4 mb-4">
                <h1 class="text-blue-800 w-1/2 m-auto text-xl">HGw Channel</h1>
                <vc-donut :size="130" :sections="sections" :thickness="50" has-legend legend-placement="left">46%</vc-donut>
            </div>

            <div class="bg-white shadow-xl p-4 mb-4">
                <h1 class="text-blue-800 w-1/2 m-auto text-xl">HGw Channel</h1>
                <vc-donut :size="130" :sections="sections" :thickness="50" has-legend legend-placement="left">46%</vc-donut>
            </div>

        </div>

        <div class="lg:flex-1 lg:mr-2">

            <div class="bg-white shadow-xl p-4 mb-4">
                <h1 class="text-blue-800 w-1/2 m-auto text-xl">HGw Channel</h1>
                <vc-donut :size="130" :sections="sections" :thickness="50" has-legend legend-placement="left">46%</vc-donut>
            </div>

            <div class="bg-white shadow-xl p-4 mb-4">
                <h1 class="text-blue-800 w-1/2 m-auto text-xl">HGw Channel</h1>
                <vc-donut :size="130" :sections="sections" :thickness="50" has-legend legend-placement="left">46%</vc-donut>
            </div>

            <div class="bg-white shadow-xl p-4 mb-4">
                <h1 class="text-blue-800 w-1/2 m-auto text-xl">HGw Channel</h1>
                <vc-donut :size="130" :sections="sections" :thickness="50" has-legend legend-placement="left">46%</vc-donut>
            </div>

            <div class="bg-white shadow-xl p-4 mb-4">
                <h1 class="text-blue-800 w-1/2 m-auto text-xl">HGw Channel</h1>
                <vc-donut :size="130" :sections="sections" :thickness="50" has-legend legend-placement="left">46%</vc-donut>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "Tables",
    data() {
        return {
            sections: [
                { label: 'Low', value: 18, color: '#db1b18' },
                { label: 'Medium', value: 36, color: '#dee610' },
                { label: 'High', value: 46, color: '#36e0a5 '}
            ]
        };
    }
}
</script>

<style scoped>

</style>

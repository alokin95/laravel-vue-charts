<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Charts</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>

    <div class="bg-white shadow-xl mb-4">
        <h1 class="text-blue-800 font-medium p-4">Info</h1>
        <table class="table w-full p-4">
            <thead>
            <tr>
                <th><abbr title="KPI Name">MAC</abbr></th>
                <th><abbr title="Min">SSID</abbr></th>
                <th><abbr title="Avg">IP</abbr></th>
                <th><abbr title="Max">Firmware</abbr></th>
            </tr>
            </thead>
            <tbody class="bg-mainContent">
            <tr class="bg-mainContent">
                <td>{{ $report->mac }}</td>
                <td>{{ $report->ssid }}</td>
                <td>{{ $report->ip_address }}</td>
                <td>{{ $report->firmware }}</td>
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
                <td>Bitrate</td>
                <td>{{ $report->bitrateData['min'] }}</td>
                <td>{{ $report->bitrateData['avg'] }}</td>
                <td>{{ $report->bitrateData['max'] }}</td>
                <td>{{ $report->bitrateData['last'] }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="bg-white shadow-xl mb-4">
        <h1 class="text-blue-800 font-medium p-4">HGw RSS</h1>
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
                <td>RSS [dBm]</td>
                <td>{{ $report->rssData['min'] }}</td>
                <td>{{ $report->rssData['avg'] }}</td>
                <td>{{  $report->rssData['max'] ?  $report->rssData['min'] :  $report->rssData['last'] }}</td>
                <td>{{  $report->rssData['last'] }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="bg-white shadow-xl mb-4">
        <h1 class="text-blue-800 font-medium p-4">HGw Interference network RSS</h1>
        <table class="table w-full p-4">
            <thead>
            <tr>
                <th><abbr title="KPI Name">KPI Name</abbr></th>
                <th><abbr title="Avg">Avg</abbr></th>
                <th><abbr title="Max">Max</abbr></th>
                <th><abbr title="Last">Last</abbr></th>
            </tr>
            </thead>
            <tbody class="bg-mainContent">
            <tr class="bg-mainContent">
                <td>RSS [dBm]</td>
                <td>{{ $report->interferenceData['avg'] }}</td>
                <td>{{ $report->interferenceData['max'] }}</td>
                <td>{{ $report->interferenceData['last']}}</td>

            </tr>
            </tbody>
        </table>
    </div>
    </body>
</html>

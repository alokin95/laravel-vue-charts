<?php

namespace Database\Seeders;

use App\Models\Bitrate;
use App\Models\Interference;
use App\Models\MacAddress;
use App\Models\Rss;
use Illuminate\Database\Seeder;

class ReportDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $endDate = new \DateTime('now');
        $beginDate = new \DateTime('-45 days');

        $interval = \DateInterval::createFromDateString('1 day');
        $period = new \DatePeriod($beginDate, $interval, $endDate);

        $macAddresses = MacAddress::all();

        foreach ($macAddresses as $macAddress)
        {
            $this->createBitrate($macAddress, $period);
            $this->createInterference($macAddress, $period);
            $this->createRss($macAddress, $period);
        }
    }

    private function createBitrate(MacAddress $macAddress, \DatePeriod $period)
    {
        foreach ($period as $day)
        {
            $bitrate = Bitrate::factory()->make();
            $bitrate->mac_address_id = $macAddress->id;
            $bitrate->created_at = $day;
            $bitrate->save();
        }
    }

    private function createInterference(MacAddress $macAddress, \DatePeriod $period)
    {
        foreach ($period as $day)
        {
            $bitrate = Interference::factory()->make();
            $bitrate->mac_address_id = $macAddress->id;
            $bitrate->created_at = $day;
            $bitrate->save();
        }
    }

    private function createRss(MacAddress $macAddress, \DatePeriod $period)
    {
        foreach ($period as $day)
        {
            $bitrate = Rss::factory()->make();
            $bitrate->mac_address_id = $macAddress->id;
            $bitrate->created_at = $day;
            $bitrate->save();
        }
    }
}

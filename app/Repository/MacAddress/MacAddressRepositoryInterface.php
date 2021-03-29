<?php


namespace App\Repository\MacAddress;


interface MacAddressRepositoryInterface
{
    public function getReportsByMacAddress(string $macAddress, $range);
    public function getReportsByMacAddressWithDateRange(string $macAddress, $range);
    public function getReportData(string $macAddress);
}

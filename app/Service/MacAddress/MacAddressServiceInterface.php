<?php


namespace App\Service\MacAddress;


interface MacAddressServiceInterface
{
    public function getReportsByMacAddress(string $macAddress, string $range);
}

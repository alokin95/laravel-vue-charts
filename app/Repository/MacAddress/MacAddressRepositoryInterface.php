<?php


namespace App\Repository\MacAddress;


interface MacAddressRepositoryInterface
{
    public function getReportsByMacAddress(string $macAddress);
}

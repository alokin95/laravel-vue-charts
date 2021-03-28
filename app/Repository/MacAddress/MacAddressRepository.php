<?php

namespace App\Repository\MacAddress;

use App\Models\MacAddress;
use App\Repository\BaseRepository;
use App\Service\MacAddress\MacAddressServiceInterface;

class MacAddressRepository extends BaseRepository implements MacAddressRepositoryInterface
{
    public function __construct(MacAddress $macAddress)
    {
        parent::__construct($macAddress);
    }

    public function getReportsByMacAddress(string $macAddress)
    {
        // TODO: Implement getReportsByMacAddress() method.
    }
}

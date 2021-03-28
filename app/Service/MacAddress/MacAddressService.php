<?php

namespace App\Service\MacAddress;

use App\Http\Exception\DomainException;
use App\Repository\MacAddress\MacAddressRepositoryInterface;

class MacAddressService implements MacAddressServiceInterface
{
    /** MacAddressRepositoryInterface */
    private $macAddressRepository;

    public function __construct
    (
        MacAddressRepositoryInterface $macAddressRepository
    )
    {
        $this->macAddressRepository = $macAddressRepository;
    }

    public function getReportsByMacAddress(string $macAddress)
    {
        $macAddressRegex = "/^([0-9A-Fa-f]{2}[\.:-]){5}([0-9A-Fa-f]{2})$/";

        if (!preg_match($macAddressRegex, $macAddress)) {
            throw new DomainException('Please enter correct format for Mac Address', 422);
        }

        return $this->macAddressRepository->getReportsByMacAddress($macAddress);
    }
}

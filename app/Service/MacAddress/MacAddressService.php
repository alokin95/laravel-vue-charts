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

    public function getReportsByMacAddress(string $macAddress, string $range)
    {
        $macAddressRegex = "/^([0-9A-Fa-f]{2}[\.:-]){5}([0-9A-Fa-f]{2})$/";

        if (!preg_match($macAddressRegex, $macAddress)) {
            throw new DomainException('Please enter correct format for Mac Address', 422);
        }

        if ($range != '1d' && $range != '7d') {
            throw new DomainException('Please enter correct range for filtering', 404);
        }

        $reports = $this->macAddressRepository->getReportsByMacAddress($macAddress, $range);

        if (!$reports) {
            throw new DomainException("No reports found", 404);
        }

        return $reports;
    }

    public function getReportsByMacAddressWithDateRange(string $macAddress, $startMiliseconds, $endMiliseconds)
    {
        $startDate = date('d-m-Y', $startMiliseconds / 1000);
        $endDate = date('d-m-Y', $endMiliseconds / 1000);

        $startDate = new \DateTime($startDate);
        $startDate->add(new \DateInterval('P1D'));

        $endDate = new \DateTime($endDate);
        $endDate->add(new \DateInterval('P1D'));

        $range['start'] = $startDate;
        $range['end'] = $endDate;

        return $this->macAddressRepository->getReportsByMacAddressWithDateRange($macAddress, $range);

    }
}

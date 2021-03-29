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

        $this->getAggregateData($reports);

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

        $reports = $this->macAddressRepository->getReportsByMacAddressWithDateRange($macAddress, $range);

        $this->getAggregateData($reports);

        return $reports;
    }

    private function getAggregateData($reports) {
        $rss['max']     = $reports->rss->max('value');
        $rss['avg']     = round($reports->rss->avg('value'));
        $rss['min']     = $reports->rss->min('value');
        $rss['last']    = $reports->rss->last()->value;

        $bitrate['max']     = $reports->bitrate->max('value');
        $bitrate['avg']     = round($reports->bitrate->avg('value'));
        $bitrate['min']     = $reports->bitrate->min('value');
        $bitrate['last']    = $reports->bitrate->last()->value;

        $interference['max']     = $reports->interference->max('value');
        $interference['avg']     = round($reports->interference->avg('value'));
        $interference['min']     = $reports->interference->min('value');
        $interference['last']    = $reports->interference->last()->value;

        $reports->rssData = $rss;
        $reports->bitrateData = $bitrate;
        $reports->interferenceData = $interference;

        return $reports;

    }
}

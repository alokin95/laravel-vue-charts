<?php

namespace App\Repository\MacAddress;

use App\Models\MacAddress;
use App\Repository\BaseRepository;
use App\Service\MacAddress\MacAddressServiceInterface;
use Carbon\Carbon;

class MacAddressRepository extends BaseRepository implements MacAddressRepositoryInterface
{
    public function __construct(MacAddress $macAddress)
    {
        parent::__construct($macAddress);
    }

    public function getReportsByMacAddress(string $macAddress, $range)
    {
        $rangeCondition = '-24 hours';

        if ($range === '7d') {
            $rangeCondition = '-7 days';
        }

        return $this->model
                ->with(
                [
                    'rss' => function($query) use ($rangeCondition) {
                        $query->where('created_at', '>', Carbon::parse($rangeCondition));
                    },
                    'interference' => function($query) use ($rangeCondition) {
                        $query->where('created_at', '>', Carbon::parse($rangeCondition));
                    },
                    'bitrate' => function($query) use ($rangeCondition) {
                        $query->where('created_at', '>', Carbon::parse($rangeCondition));
                    },
                    'contract'
                ])
                ->where([
                    'mac'   => $macAddress,
                ])
                ->first();
    }

    public function getReportsByMacAddressWithDateRange(string $macAddress, $range)
    {
        return $this->model
            ->with(
                [
                    'rss' => function($query) use ($range) {
                        $query->where(
                            [
                                ['created_at', '>', Carbon::parse($range['start'])],
                                ['created_at', '<', Carbon::parse($range['end'])],
                            ]
                        );
                    },
                    'interference' => function($query) use ($range) {
                        $query->where(
                            [
                                ['created_at', '>', Carbon::parse($range['start'])],
                                ['created_at', '<', Carbon::parse($range['end'])],
                            ]
                        );
                    },
                    'bitrate' => function($query) use ($range) {
                        $query->where(
                            [
                                ['created_at', '>', Carbon::parse($range['start'])],
                                ['created_at', '<', Carbon::parse($range['end'])],
                            ]
                        );
                    },
                    'contract'
                ])
            ->where([
                'mac'   => $macAddress,
            ])
            ->first();
    }
}

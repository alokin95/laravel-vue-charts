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

    public function getReportsByMacAddress(string $macAddress)
    {
        return $this->model
                ->with(
                [
                    'rss' => function($query) {
                        $query->where('created_at', '>', Carbon::parse('-24 hours'));
                    },
                    'interference' => function($query) {
                        $query->where('created_at', '>', Carbon::parse('-24 hours'));
                    },
                    'bitrate' => function($query) {
                        $query->where('created_at', '>', Carbon::parse('-24 hours'));
                    },
                    'contract'
                ])
                ->where([
                    'mac'   => $macAddress,
                ])
                ->first();
    }
}

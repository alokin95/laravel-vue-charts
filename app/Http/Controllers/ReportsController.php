<?php

namespace App\Http\Controllers;

use App\Repository\Contract\ContractRepository;
use App\Repository\Contract\ContractRepositoryInterface;
use App\Service\Contract\ContractServiceInterface;
use App\Service\MacAddress\MacAddressServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /** @var ContractServiceInterface */
    private $contractService;

    /** @var MacAddressServiceInterface */
    private $macAddressService;

    public function __construct
    (
        ContractServiceInterface $contractService,
        MacAddressServiceInterface $macAddressService
    )
    {
        $this->contractService = $contractService;
        $this->macAddressService = $macAddressService;
    }

    public function contractSearch($contractNumber)
    {
        $contracts = $this->contractService->getContractByNumber($contractNumber);

        return new JsonResponse($contracts);
    }

    public function getReports($macAddress, $range)
    {
        $reports = $this->macAddressService->getReportsByMacAddress($macAddress, $range);

        return new JsonResponse($reports);
    }

    public function getReportsWithDateRange($macAddress, $start, $end)
    {
        $reports = $this->macAddressService->getReportsByMacAddressWithDateRange($macAddress, $start, $end);

//        $created_at = new Carbon($reports->rss[0]->created_at);
//
////        $createdAt = new Carbon()->toDateTimeString();
//        dd($created_at->toDateTimeString());
        return new JsonResponse($reports);
    }
}

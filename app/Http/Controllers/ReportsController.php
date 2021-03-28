<?php

namespace App\Http\Controllers;

use App\Repository\Contract\ContractRepository;
use App\Repository\Contract\ContractRepositoryInterface;
use App\Service\Contract\ContractServiceInterface;
use App\Service\MacAddress\MacAddressServiceInterface;
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

    public function contractSearch(Request $request, $contractNumber)
    {
        $contracts = $this->contractService->getContractByNumber($contractNumber);

        return new JsonResponse($contracts);
    }

    public function getReports(Request $request, $macAddress)
    {
        $reports = $this->macAddressService->getReportsByMacAddress($macAddress);
        dd($reports);
    }
}

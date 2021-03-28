<?php

namespace App\Http\Controllers;

use App\Repository\Contract\ContractRepository;
use App\Repository\Contract\ContractRepositoryInterface;
use App\Service\Contract\ContractServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /** @var ContractServiceInterface */
    private $contractService;

    public function __construct
    (
        ContractServiceInterface $contractService
    )
    {
        $this->contractService = $contractService;
    }

    public function contractSearch(Request $request, $contractNumber)
    {
        $contracts = $this->contractService->getContractByNumber($contractNumber);

        return new JsonResponse($contracts);
    }

    public function macAddressSearch(Request $request)
    {

    }
}

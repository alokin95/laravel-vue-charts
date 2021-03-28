<?php


namespace App\Service\Contract;


use App\Repository\Contract\ContractRepositoryInterface;

class ContractService implements ContractServiceInterface
{
    /** ContractRepositoryInterface */
    private $contractRepository;

    public function __construct
    (
        ContractRepositoryInterface $contractRepository
    )
    {
        $this->contractRepository = $contractRepository;
    }

    public function getContractByNumber(string $number)
    {
        return $this->contractRepository->findContractByNumber($number);
    }
}

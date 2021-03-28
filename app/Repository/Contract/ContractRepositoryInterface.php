<?php

namespace App\Repository\Contract;

interface ContractRepositoryInterface
{
    public function findContractByNumber(string $contractNumber);
}

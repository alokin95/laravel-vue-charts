<?php

namespace App\Repository\Contract;

use App\Models\Contract;
use App\Repository\BaseRepository;

class ContractRepository extends BaseRepository implements ContractRepositoryInterface
{
    public function __construct(Contract $contract)
    {
        parent::__construct($contract);
    }

    public function findContractByNumber(string $contractNumber)
    {
        return $this->model->with('macAddress')->where('contract_number', 'like', '%' . $contractNumber . '%')->get();
    }
}

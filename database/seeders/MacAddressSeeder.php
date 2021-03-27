<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\MacAddress;
use Illuminate\Database\Seeder;

class MacAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ContractSeeder::class
        ]);

        $contracts = Contract::all();

        foreach ($contracts as $contract)
        {
            $mac = MacAddress::factory()
                ->make();
            $mac->contract_id = $contract->id;
            $mac->save();
        }
    }
}

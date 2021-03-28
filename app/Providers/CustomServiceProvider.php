<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\Contract\ContractRepository;
use App\Repository\Contract\ContractRepositoryInterface;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\MacAddress\MacAddressRepository;
use App\Repository\MacAddress\MacAddressRepositoryInterface;
use App\Service\Contract\ContractService;
use App\Service\Contract\ContractServiceInterface;
use App\Service\MacAddress\MacAddressService;
use App\Service\MacAddress\MacAddressServiceInterface;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);

        $this->app->bind(ContractRepositoryInterface::class, ContractRepository::class);
        $this->app->bind(ContractServiceInterface::class, ContractService::class);

        $this->app->bind(MacAddressServiceInterface::class, MacAddressService::class);
        $this->app->bind(MacAddressRepositoryInterface::class, MacAddressRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

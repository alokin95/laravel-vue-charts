<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\Contract\ContractRepository;
use App\Repository\Contract\ContractRepositoryInterface;
use App\Repository\EloquentRepositoryInterface;
use App\Service\Contract\ContractService;
use App\Service\Contract\ContractServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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

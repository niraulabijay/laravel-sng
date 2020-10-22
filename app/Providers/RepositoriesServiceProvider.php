<?php

namespace App\Providers;

use App\Repositories\booking\BookingRepository;
use App\Repositories\booking\BookingInterface;
use App\Repositories\brand\BrandInterface;
use App\Repositories\brand\BrandRepository;
use App\Repositories\brand\BrandSettingInterface;
use App\Repositories\brand\BrandSettingRepository;
use App\Repositories\destination\DestinationInterface;
use App\Repositories\destination\DestinationRepository;
use App\Repositories\EloquentRepository;
use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\faq\FaqInterface;
use App\Repositories\faq\FaqRepository;
use App\Repositories\user\CustomerInterface;
use App\Repositories\user\CustomerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(BookingInterface::class, BookingRepository::class);
        $this->app->bind(EloquentRepositoryInterface::class, EloquentRepository::class);
        $this->app->bind(CustomerInterface::class, CustomerRepository::class);
        $this->app->bind(BrandInterface::class, BrandRepository::class);
        $this->app->bind(BrandSettingInterface::class, BrandSettingRepository::class);
        $this->app->bind(DestinationInterface::class, DestinationRepository::class);
        $this->app->bind(FaqInterface::class, FaqRepository::class);
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

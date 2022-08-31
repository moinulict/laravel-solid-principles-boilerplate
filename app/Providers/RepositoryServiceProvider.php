<?php

namespace App\Providers;

use App\Repository\Brand\BrandInterface;
use App\Repository\Brand\BrandRepository;
use App\Repository\Upload\AwsUploadRepository;
use App\Repository\Upload\DigitalOceanUploadRepository;
use App\Repository\Upload\UploadInterface;
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
        $this->app->bind(BrandInterface::class, BrandRepository::class);
        $this->app->bind(UploadInterface::class, AwsUploadRepository::class);
        $this->app->bind(UploadInterface::class, DigitalOceanUploadRepository::class);
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

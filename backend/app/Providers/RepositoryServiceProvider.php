<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\User\UserRepositoryInterface;
use App\Repositories\Eloquent\User\UserRepository;

use App\Repositories\Contracts\Auth\OtpRepositoryInterface;
use App\Repositories\Eloquent\Auth\OtpRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            OtpRepositoryInterface::class,
            OtpRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}

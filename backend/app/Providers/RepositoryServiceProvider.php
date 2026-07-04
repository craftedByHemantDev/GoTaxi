<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\User\UserRepositoryInterface;
use App\Repositories\Eloquent\User\UserRepository;

use App\Repositories\Contracts\Auth\OtpRepositoryInterface;
use App\Repositories\Eloquent\Auth\OtpRepository;

use App\Services\Contracts\Auth\OTPServiceInterface;
use App\Services\Auth\OTPService;

use App\Services\Auth\AuthService;
use App\Services\Contracts\Auth\AuthServiceInterface;

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

        $this->app->bind(
            OTPServiceInterface::class,
            OTPService::class
        );

        $this->app->bind(
    AuthServiceInterface::class,
    AuthService::class
);
    }

    public function boot(): void
    {
        //
    }
}

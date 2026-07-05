<?php

namespace App\Providers;

use App\Repositories\Contracts\Auth\OtpRepositoryInterface;
use App\Repositories\Contracts\User\UserRepositoryInterface;
use App\Repositories\Eloquent\Auth\OtpRepository;
use App\Repositories\Eloquent\User\UserRepository;
use App\Services\Auth\AuthService;
use App\Services\Auth\OTPService;
use App\Services\Contracts\Auth\AuthServiceInterface;
use App\Services\Contracts\Auth\OTPServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\User\UserServiceInterface;
use App\Services\User\UserService;

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

        $this->app->bind(
    UserServiceInterface::class,
    UserService::class
);
    }

    public function boot(): void
    {
        //
    }
}

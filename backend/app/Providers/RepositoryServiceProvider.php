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
use App\Services\Contracts\Shared\FileStorageServiceInterface;
use App\Services\Shared\FileStorageService;
use App\Services\User\UserService;
use App\Repositories\Contracts\Driver\DriverRepositoryInterface;
use App\Repositories\Eloquent\Driver\DriverRepository;
use App\Services\Contracts\Driver\DriverServiceInterface;
use App\Services\Driver\DriverService;
use App\Repositories\Contracts\Driver\DriverDocumentRepositoryInterface;
use App\Repositories\Eloquent\Driver\DriverDocumentRepository;
use App\Services\Contracts\Driver\DriverDocumentServiceInterface;
use App\Services\Driver\DriverDocumentService;
use App\Services\Contracts\Driver\DriverVerificationServiceInterface;
use App\Services\Driver\DriverVerificationService;
use App\Repositories\Contracts\Driver\DriverVehicleRepositoryInterface;
use App\Repositories\Eloquent\Driver\DriverVehicleRepository;
use App\Services\Contracts\Driver\DriverVehicleServiceInterface;
use App\Services\Driver\DriverVehicleService;

use App\Repositories\Contracts\Driver\DriverVehicleDocumentRepositoryInterface;
use App\Repositories\Driver\DriverVehicleDocumentRepository;

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

$this->app->bind(
    FileStorageServiceInterface::class,
    FileStorageService::class
);

$this->app->bind(
    DriverRepositoryInterface::class,
    DriverRepository::class
);

$this->app->bind(

    DriverVerificationServiceInterface::class,

    DriverVerificationService::class

);

$this->app->bind(
    DriverServiceInterface::class,
    DriverService::class
);

$this->app->bind(
    DriverDocumentRepositoryInterface::class,
    DriverDocumentRepository::class
);


$this->app->bind(
    DriverDocumentServiceInterface::class,
    DriverDocumentService::class
);

$this->app->bind(

    DriverVehicleRepositoryInterface::class,

    DriverVehicleRepository::class

);

$this->app->bind(

    DriverVehicleServiceInterface::class,

    DriverVehicleService::class

);

$this->app->bind(
        DriverVehicleDocumentRepositoryInterface::class,
        DriverVehicleDocumentRepository::class
    );
    

    }

    public function boot(): void
    {
        //
    }
}

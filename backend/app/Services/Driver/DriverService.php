<?php

namespace App\Services\Driver;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Driver;
use App\Enums\Driver\DriverStatus;
use App\Services\Contracts\Driver\DriverServiceInterface;
use App\Repositories\Contracts\Driver\DriverRepositoryInterface;

class DriverService implements DriverServiceInterface
{
    public function __construct(
        private readonly DriverRepositoryInterface $driverRepository
    ) {
    }

    public function register(
        int $userId,
        array $data
    ): array {

        $driver = $this->driverRepository->create([

            'uuid' => Str::uuid(),

            'user_id' => $userId,

            'license_number' => $data['license_number'],

            'license_expiry_date' => $data['license_expiry_date'],

            'status' => DriverStatus::PENDING,

            'rating' => 5,

            'total_rides' => 0,

            'is_online' => false,

            'is_available' => false,

            'driver_code' => $this->generateDriverCode(),

        ]);

        return [

            'driver' => $driver,

        ];

    }

    private function generateDriverCode(): string
{
    return 'DRV' . now()->format('Ymd') . random_int(1000, 9999);
}

public function replaceByUser(
    User $user,
    string $documentType,
    UploadedFile $file
) {

    $driver = $this->driverRepository
        ->findByUserId($user->id);

    if (! $driver) {

        throw new ApiException(
            'Driver not found.',
            404
        );
    }

    return $this->replace(
        $driver,
        $documentType,
        $file
    );
}
}

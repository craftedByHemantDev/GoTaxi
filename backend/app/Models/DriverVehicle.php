<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Enums\Driver\VehicleStatus;
use App\Enums\Driver\VehicleType;

use Illuminate\Database\Eloquent\Relations\HasMany;
class DriverVehicle extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'uuid',

        'driver_id',

        'vehicle_type',

        'brand',

        'model',

        'color',

        'manufacture_year',

        'registration_number',

        'status',

        'is_active',

    ];

    protected function casts(): array
    {
        return [

            'vehicle_type' => VehicleType::class,

            'status' => VehicleStatus::class,

            'is_active' => 'boolean',

        ];
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function driver()
    {
        return $this->belongsTo(
            Driver::class
        );
    }

    public function documents(): HasMany
{
    return $this->hasMany(
        DriverVehicleDocument::class
    );
}
}

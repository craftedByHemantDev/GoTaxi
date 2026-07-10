<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\Driver\DriverStatus;

class Driver extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [

        'uuid',

        'user_id',

        'driver_code',

        'status',

        'rating',

        'total_rides',

        'is_online',

        'is_available',

        'current_latitude',

        'current_longitude',

        'approved_at',

    ];

    protected function casts(): array
{
    return [

        'approved_at' => 'datetime',

        'is_online' => 'boolean',

        'is_available' => 'boolean',

        'rating' => 'decimal:2',

        'status' => DriverStatus::class,

    ];
}

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

public function documents()
{
    return $this->hasMany(DriverDocument::class);
}

public function vehicles()
{
    return $this->hasMany(
        DriverVehicle::class
    );
}


}


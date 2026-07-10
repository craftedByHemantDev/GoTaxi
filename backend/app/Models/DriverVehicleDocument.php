<?php

namespace App\Models;

use App\Enums\Driver\DriverDocumentStatus;
use App\Enums\Driver\DriverVehicleDocumentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverVehicleDocument extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'uuid',

        'driver_vehicle_id',

        'document_type',

        'file_path',

        'file_name',

        'mime_type',

        'file_size',

        'status',

        'remarks',

        'verified_at',

        'verified_by',

    ];

    protected function casts(): array
    {
        return [

            'document_type' => DriverVehicleDocumentType::class,

            'status' => DriverDocumentStatus::class,

            'verified_at' => 'datetime',

        ];
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(
            DriverVehicle::class,
            'driver_vehicle_id'
        );
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'verified_by'
        );
    }
}

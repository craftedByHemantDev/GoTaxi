<?php

namespace App\Http\Resources\Driver;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'uuid' => $this->uuid,

            'license_number' => $this->license_number,

            'license_expiry_date' => $this->license_expiry_date,

            'status' => $this->status->value,

            'rating' => $this->rating,

            'total_rides' => $this->total_rides,

            'is_online' => $this->is_online,

            'is_available' => $this->is_available,

            'created_at' => $this->created_at,

        ];
    }
}

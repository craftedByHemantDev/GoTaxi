<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [

            'uuid' => $this->uuid,

            'first_name' => $this->first_name,

            'middle_name' => $this->middle_name,

            'last_name' => $this->last_name,

            'display_name' => $this->display_name,

            'country_code' => $this->country_code,

            'mobile' => $this->mobile,

            'email' => $this->email,

            'profile_photo' => $this->profile_photo
    ? asset('storage/'.$this->profile_photo)
    : null,

            'preferred_language' => $this->preferred_language?->value,

            'status' => $this->status?->value,

            'created_at' => $this->created_at?->toDateTimeString(),

        ];
    }
}

<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

use App\Enums\Driver\VehicleType;

class UpdateVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'vehicle_type' => [
                'sometimes',
                new Enum(VehicleType::class),
            ],

            'brand' => [
                'sometimes',
                'string',
                'max:100',
            ],

            'model' => [
                'sometimes',
                'string',
                'max:100',
            ],

            'color' => [
                'sometimes',
                'string',
                'max:50',
            ],

            'manufacture_year' => [
                'sometimes',
                'integer',
                'digits:4',
                'min:2000',
                'max:' . date('Y'),
            ],

            'registration_number' => [
                'sometimes',
                'string',
                'max:30',
            ],

        ];
    }
}

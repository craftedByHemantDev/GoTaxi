<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

use App\Enums\Driver\VehicleType;

class RegisterVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'vehicle_type' => [
                'required',
                new Enum(VehicleType::class),
            ],

            'brand' => [
                'required',
                'string',
                'max:100',
            ],

            'model' => [
                'required',
                'string',
                'max:100',
            ],

            'color' => [
                'required',
                'string',
                'max:50',
            ],

            'manufacture_year' => [
                'required',
                'digits:4',
                'integer',
                'min:2000',
                'max:' . date('Y'),
            ],

            'registration_number' => [
                'required',
                'string',
                'max:30',
            ],

        ];
    }
}

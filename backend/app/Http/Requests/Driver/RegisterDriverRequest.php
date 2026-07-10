<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDriverRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'license_number' => [
                'required',
                'string',
                'max:100',
            ],

            'license_expiry_date' => [
                'required',
                'date',
                'after:today',
            ],

        ];
    }
}

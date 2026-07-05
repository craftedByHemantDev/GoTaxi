<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class VerifyLoginOtpRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'country_code' => [
                'required',
                'string',
                'max:10',
            ],

            'mobile' => [
                'required',
                'digits_between:8,15',
            ],

            'otp' => [
                'required',
                'digits:6',
            ],
        ];
    }
}

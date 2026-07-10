<?php

namespace App\Http\Requests\Driver;

use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Driver\DocumentType;

class UploadDriverDocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'document_type' => [
                'required',
                new Enum(DocumentType::class),
            ],

            'file' => [

                'required',

                'file',

                'mimes:jpg,jpeg,png,pdf',

                'max:5120',

            ],

        ];
    }
}

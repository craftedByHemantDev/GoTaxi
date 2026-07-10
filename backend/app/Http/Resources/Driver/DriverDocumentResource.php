<?php

namespace App\Http\Resources\Driver;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverDocumentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'uuid' => $this->uuid,

            'document_type' => $this->document_type,

            'file_url' => asset('storage/'.$this->file_path),

            'status' => $this->status,

            'uploaded_at' => $this->created_at,

        ];
    }
}

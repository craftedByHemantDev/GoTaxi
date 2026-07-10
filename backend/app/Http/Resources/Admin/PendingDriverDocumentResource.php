<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PendingDriverDocumentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'document_uuid' => $this->uuid,

            'driver_uuid' => $this->driver->uuid,

            'driver_name' => $this->driver->user->display_name,

            'mobile' => $this->driver->user->mobile,

            'document_type' => $this->document_type,

            'status' => $this->status,

            'file_url' => asset(
                'storage/'.$this->file_path
            ),

            'uploaded_at' => $this->created_at,

        ];
    }
}

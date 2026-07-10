<?php

namespace App\Models;

use App\Enums\Driver\DocumentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\Driver\DocumentType;


class DriverDocument extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [

        'uuid',

        'driver_id',

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

        'verified_at' => 'datetime',

        'file_size' => 'integer',

        'document_type' => DocumentType::class,

        'status' => DocumentStatus::class,

    ];
}

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function verifiedBy()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function getRouteKeyName(): string
{
    return 'uuid';
}
}

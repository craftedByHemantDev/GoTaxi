<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class OtpVerification extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [

        'uuid',

        'country_code',

        'mobile',

        'otp',

        'purpose',

        'attempts',

        'expires_at',

        'verified_at',

        'ip_address',

        'user_agent',
    ];

    protected function casts(): array
    {
        return [

            'expires_at'=>'datetime',

            'verified_at'=>'datetime',

        ];
    }

    public function uniqueIds(): array
    {
        return ['uuid'];
    }
}

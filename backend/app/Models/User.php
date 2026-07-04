<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Enums\User\UserStatus;
use App\Enums\User\Language;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;
    use HasUuids;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
    'uuid',
    'first_name',
    'middle_name',
    'last_name',
    'display_name',
    'country_code',
    'mobile',
    'email',
    'password',
    'profile_photo',
    'gender',
    'date_of_birth',
    'preferred_language',
    'status',
];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    protected function casts(): array
{
    return [

        'password' => 'hashed',

        'mobile_verified_at' => 'datetime',

        'email_verified_at' => 'datetime',

        'last_login_at' => 'datetime',

        'date_of_birth' => 'date',

        'status' => UserStatus::class,

        'preferred_language' => Language::class,
    ];
}
}

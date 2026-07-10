<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {

            $table->id();

            $table->uuid('uuid')->unique();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('driver_code',30)
                ->unique();

            $table->string('status',30)
                ->default('pending')
                ->index();

            $table->decimal(
                'rating',
                3,
                2
            )->default(5.00);

            $table->unsignedInteger('total_rides')
                ->default(0);

            $table->boolean('is_online')
                ->default(false);

            $table->boolean('is_available')
                ->default(false);

            $table->decimal(
                'current_latitude',
                10,
                7
            )->nullable();

            $table->decimal(
                'current_longitude',
                10,
                7
            )->nullable();

            $table->timestamp('approved_at')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};

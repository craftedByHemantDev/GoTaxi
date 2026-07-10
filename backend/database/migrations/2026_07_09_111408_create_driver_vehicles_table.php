<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('driver_vehicles', function (Blueprint $table) {

            $table->id();

            $table->uuid('uuid')->unique();

            $table->foreignId('driver_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('vehicle_type',30)->index();

            $table->string('brand',100);

            $table->string('model',100);

            $table->string('color',50);

            $table->year('manufacture_year');

            $table->string('registration_number')
                ->unique();

            $table->string('status',20)
                ->default('pending')
                ->index();

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('driver_vehicles');
    }
};

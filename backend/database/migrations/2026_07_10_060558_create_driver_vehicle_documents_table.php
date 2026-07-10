<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('driver_vehicle_documents', function (Blueprint $table) {

    $table->id();

    $table->uuid('uuid')->unique();

    $table->foreignId('driver_vehicle_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->string('document_type',50)->index();

    $table->string('file_path');

    $table->string('file_name');

    $table->string('mime_type',100);

    $table->unsignedBigInteger('file_size');

    $table->string('status',20)
        ->default('pending')
        ->index();

    $table->text('remarks')->nullable();

    $table->timestamp('verified_at')->nullable();

    $table->foreignId('verified_by')
        ->nullable()
        ->constrained('users')
        ->nullOnDelete();

    $table->timestamps();

    $table->softDeletes();

    $table->index([
        'driver_vehicle_id',
        'document_type'
    ]);

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_vehicle_documents');
    }
};

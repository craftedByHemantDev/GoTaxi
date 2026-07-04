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
       Schema::create('otp_verifications', function (Blueprint $table) {

    $table->id();

    $table->uuid('uuid')->unique();

    $table->string('country_code',10)->index();

    $table->string('mobile',20)->index();

    $table->string('otp',255);

    $table->string('purpose',30)->index();

    $table->unsignedTinyInteger('attempts')->default(0);

    $table->timestamp('expires_at');

    $table->timestamp('verified_at')->nullable();

    $table->string('ip_address',45)->nullable();

    $table->text('user_agent')->nullable();

    $table->timestamps();

    $table->index([
        'country_code',
        'mobile',
        'purpose'
    ]);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otp_verifications');
    }
};

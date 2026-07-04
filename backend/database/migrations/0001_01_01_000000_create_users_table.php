<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->uuid('uuid')->unique();

            $table->string('first_name', 100);

            $table->string('middle_name', 100)->nullable();

            $table->string('last_name', 100)->nullable();

            $table->string('display_name', 150)->index();

            $table->string('country_code', 10)->default('+91')->index();

            $table->string('mobile', 20)->unique();

            $table->string('email')->nullable()->unique();

            $table->string('password')->nullable();

            $table->string('profile_photo')->nullable();

            $table->string('gender', 20)->nullable();

            $table->date('date_of_birth')->nullable();

            $table->string('preferred_language', 10)->default('en');

            $table->string('status', 20)->default('pending')->index();

            $table->timestamp('mobile_verified_at')->nullable();

            $table->timestamp('email_verified_at')->nullable();

            $table->timestamp('last_login_at')->nullable();

            $table->string('last_login_ip', 45)->nullable();

            $table->rememberToken();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

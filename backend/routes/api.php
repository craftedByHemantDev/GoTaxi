<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\AuthController;


Route::prefix('v1')->group(function () {
    require __DIR__.'/auth.php';
    require __DIR__.'/customer.php';
    require __DIR__.'/driver.php';
    require __DIR__.'/admin.php';

});
Route::prefix('v1/auth')->group(function () {

    Route::post(
        'send-login-otp',
        [AuthController::class, 'sendLoginOtp']
    );

});

<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1/user')->group(function () {
    require __DIR__.'/auth.php';
    require __DIR__.'/customer.php';
    require __DIR__.'/driver.php';
    require __DIR__.'/admin.php';
    require __DIR__.'/api_v1/user.php';

});
Route::prefix('v1/auth')->group(function () {

    Route::post(
        'send-login-otp',
        [AuthController::class, 'sendLoginOtp']
    );

    Route::post(
    'verify-login-otp',
    [AuthController::class, 'verifyLoginOtp']
);

Route::post(
    'complete-profile',
    [AuthController::class, 'completeProfile']
);


Route::post(
    'logout',
    [AuthController::class, 'logout']
)->middleware('auth:sanctum');


});



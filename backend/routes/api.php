<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Driver\DriverController;
use App\Http\Controllers\Api\V1\Admin\DriverVerificationController;
use App\Http\Controllers\Api\V1\Driver\DriverVehicleController;

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


Route::post(
    'logout-all',
    [AuthController::class, 'logoutAllDevices']
)->middleware('auth:sanctum');


});

Route::prefix('v1/driver')->group(function () {


Route::post(
    '/register',
    [DriverController::class, 'register']
)->middleware('auth:sanctum');


Route::post(

    '/document/upload',

    [DriverController::class, 'uploadDocument']

)->middleware('auth:sanctum');

Route::get(
    '/documents',
    [DriverController::class, 'documents']
)->middleware('auth:sanctum');

Route::delete(

    '/document/{uuid}',

    [DriverController::class, 'deleteDocument']

)->middleware('auth:sanctum');




});


Route::middleware([
    'auth:sanctum'
])->prefix('v1/driver/document/')->group(function () {

    Route::patch(

        '{document}/approve',

        [DriverVerificationController::class, 'approve']

    );

    Route::patch(

        '{document}/reject',

        [DriverVerificationController::class, 'reject']

    );

});

Route::middleware('auth:sanctum')->prefix('v1/driver/')->group(function () {

    Route::post(

        'vehicles',

        [DriverVehicleController::class, 'store']

    );
    Route::get(

    'vehicles',

    [DriverVehicleController::class,'index']

);


Route::put(

    'vehicles/{uuid}',

    [DriverVehicleController::class,'update']

);

Route::delete(

    'vehicles/{uuid}',

    [DriverVehicleController::class,'destroy']

);

Route::patch(

    'vehicles/{uuid}/deactivate',

    [DriverVehicleController::class,'deactivate']

);

});

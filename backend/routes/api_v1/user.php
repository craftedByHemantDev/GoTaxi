<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\User\UserController;
use App\Http\Controllers\Api\V1\Auth\AuthController;

Route::middleware('auth:sanctum')->group(function () {

    Route::get(
        'profile',
        [UserController::class, 'profile']
    );

    Route::put(
    'profile',
    [UserController::class, 'updateProfile']
);

Route::post(
    'profile-photo',
    [UserController::class, 'uploadProfilePhoto']
);

Route::delete(
    'profile-photo',
    [UserController::class, 'deleteProfilePhoto']
);

});
